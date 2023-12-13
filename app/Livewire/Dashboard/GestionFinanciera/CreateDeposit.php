<?php

namespace App\Livewire\Dashboard\GestionFinanciera;

use App\Models\Deposit;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\WeeklyReport;
use App\Models\MonthlyReport;
use Livewire\Attributes\On;

class CreateDeposit extends Component
{
    public $modalOpen = false;
      // Agrega otros campos necesarios desde tu formulario
      public $donor_name;
      public $donor_id;
      public $type_donor_id;
      public $value;
      public $type;
      public $url;
  
      public $monthlyReport_id;

      #[On('show-modal-create')]
      public function openModal()
      {
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
        // Obtener la fecha de creación
        $creationDate = Carbon::now()->startOfDay();
        //$date_transaction = $creationDate;

        // Obtener la fecha del último día de la semana
        $lastDayOfWeek = Carbon::now()->endOfWeek()->startOfDay();

        // Buscar un registro semanal existente con la misma fecha
        $weeklyReport = WeeklyReport::where('date', $lastDayOfWeek)->first();

        if (!$weeklyReport) {
            // Si no se encuentra un registro semanal, obtén la fecha del último día del mes
            $lastDayOfMonth =  Carbon::now()->endOfMonth()->startOfDay();

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
                'date' => $lastDayOfWeek,
                'monthly_reports_id' => $monthlyReport_id,
                // Otros campos del reporte semanal
            ]);
        }

        // Crea la transacción y asóciala al reporte semanal
        $deposit = Deposit::create([
            'donor_id' => $this->donor_id,
            'type_donor_id' => $this->type_donor_id,
            'donor_name' => $this->donor_name,
            'value' => $this->value,
            'type' => $this->type,
            'url' => $this->url,
            'date' => $creationDate,
            'weekly_reports_id' => $weeklyReport->id,
            // Otros campos de la transacción
        ]);

        // emitir eventos Livewire si es necesario
        $this->dispatch('update_tables');
        
        // Limpiar el formulario u otras acciones
        $this->reset();
        

        // emitir un mensaje de éxito o redirigir a otra página
        session()->flash('message', 'Transacción creada con éxito.');
    }
    public function render()
    {
        return view('livewire.dashboard.gestion-financiera.create-deposit');
    }
}
