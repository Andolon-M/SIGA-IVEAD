<?php

namespace App\Livewire\Dashboard\GestionFinanciera;


use App\Models\Egress;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\WeeklyReport;
use App\Models\MonthlyReport;
use Livewire\Attributes\On;


class EditEgress extends Component
{

    public $modalOpen = false;
    // Agrega otros campos necesarios desde tu formulario
    public $id;
    public $description;
    public $type;
    public $url;
    public $date;
    public $value;

    public $monthlyReport_id;

    #[On('show-modal-edit-egreso')]
    public function openModal($id)
    {
        $egress = Egress::find($id);
        $this->id = $egress->id;
        $this->description = $egress->description;
        $this->type = $egress->type;
        $this->value = $egress->value;
        $this->url = $egress->url;
        $this->date = $egress->date;
        $this->modalOpen = true;
    }
    #[On('close-modal')]
    public function closeModal()
    {
        $this->modalOpen = false;
        $this->reset();
        $this->dispatch('update_tables');
    }
    public function save()
    {
        //obtener el ultimo dia de la semana apartir de la nueva fecha
        $new_last_dayWeek = Carbon::parse($this->date)->endOfWeek()->startOfDay();
        $weeklyReport = WeeklyReport::where('date', $new_last_dayWeek)->first();


        if (!$weeklyReport) {
            // Si no se encuentra un registro semanal, obtén la fecha del último día del mes
            $lastDayOfMonth =  Carbon::parse($this->date)->endOfMonth()->startOfDay();

            // Buscar un registro mensual existente con la misma fecha
            $monthlyReport = MonthlyReport::where('date', $lastDayOfMonth)->first();

            if (!$monthlyReport) {
                
                // Si no se encuentra un registro mensual, crea uno nuevo
                $monthlyReport = MonthlyReport::create([
                    'date' => $lastDayOfMonth,
                    // Otros campos del reporte mensual
                ]);
            }
           
            // Asigna el ID del informe mensual
            $monthlyReport_id = $monthlyReport->id;
            // dd($monthlyReport_id);

            // Crea un nuevo registro semanal asociado al reporte mensual
            $weeklyReport = WeeklyReport::create([
                'date' => $new_last_dayWeek,
                'monthly_reports_id' => $monthlyReport_id,
                // Otros campos del reporte semanal
            ]);
        }


        $egrees = Egress::updateOrCreate(['id' => $this->id,]);
        $egrees->description = $this->description;
        $egrees->value = $this->value;
        $egrees->type = $this->type;
        $egrees->url = $this->url;
        $egrees->weekly_reports_id = $weeklyReport->id;
        $egrees->date = $this->date;


        $egrees->save();
        $this->dispatch('close-modal')->self();
    }


    public function render()
    {
        return view('livewire.dashboard.gestion-financiera.edit-egress');
    }
}
