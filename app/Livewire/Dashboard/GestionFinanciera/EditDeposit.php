<?php

namespace App\Livewire\Dashboard\GestionFinanciera;

use App\Models\Deposit;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\WeeklyReport;
use App\Models\MonthlyReport;
use Livewire\Attributes\On;

class EditDeposit extends Component
{
    public $modalOpen = false;
    // Agrega otros campos necesarios desde tu formulario
    public $id;
    public $donor_name;
    public $donor_id;
    public $type_donor_id;
    public $value;
    public $type;
    public $url;
    public $date;

    public $monthlyReport_id;

    #[On('show-modal-edit')]
    public function openModal($id)
    {
        $deposit = Deposit::find($id);
        $this->id = $deposit->id;
        $this->donor_name = $deposit->donor_name;
        $this->donor_id = $deposit->donor_id;
        $this->type_donor_id = $deposit->type_donor_id;
        $this->value = $deposit->value;
        $this->type = $deposit->type;
        $this->url = $deposit->url;
        $this->date = $deposit->date;
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


        $deposit = Deposit::updateOrCreate(['id' => $this->id,]);
        $deposit->donor_name = $this->donor_name;
        $deposit->donor_id = $this->donor_id;
        $deposit->type_donor_id = $this->type_donor_id;
        $deposit->value = $this->value;
        $deposit->type = $this->type;
        $deposit->url = $this->url;
        $deposit->weekly_reports_id = $weeklyReport->id;
        $deposit->date = $this->date;


        $deposit->save();
        $this->dispatch('close-modal')->self();
    }


    public function render()
    {
        return view('livewire.dashboard.gestion-financiera.edit-deposit');
    }
}
