<?php

namespace App\Livewire\Dashboard\GestionFinanciera;

use App\Models\Deposit;
use App\Models\Egress;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\WeeklyReport;
use App\Models\MonthlyReport;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class IndexLive extends Component
{
    use WithPagination;

    public $numpaginate;
    public $numpaginateingresos;
    public $search;

    public function mount()
    {
        $this->numpaginate = 5;
        $this->numpaginateingresos = 5;
    }

    public function updatingSearch()
    {
        $this->dispatch('update_tables')->self(); // Evento para actualizar la tabla mediante el método render
        $this->resetPage(); // Refresca la paginación
    }

    #[On('update_tables')]
    public function render()
    {
        // Inicializa los totales
        $total_ingresos_semana = 0;
        $total_egresos_semana = 0;
        $total_ingresos_mes = 0;
        $total_egresos_mes = 0;
        $total_balance_semana = 0;
        $total_balance_mes = 0;

        // Obtén los ingresos paginados
        $ingresos = Deposit::orderBy('id', 'desc')
            ->where(
                fn ($query) =>
                $query->where('id', 'like', "$this->search%")
                    ->orWhere('donor_name', 'like', "$this->search%")
                    ->orWhere('donor_id', 'like', "$this->search%")
                    ->orWhere('date', 'like', "$this->search%")
                    ->orWhere('value', 'like', "$this->search%")
                    ->orWhere('type', 'like', "$this->search%")
            )->paginate($this->numpaginateingresos);

        // Obtén los egresos paginados
        $egresos = Egress::orderBy('id', 'desc')->where(
            fn ($query) =>
            $query->where('id', 'like', "$this->search%")
                ->orWhere('type', 'like', "$this->search%")
                ->orWhere('date', 'like', "$this->search%")
                ->orWhere('value', 'like', "$this->search%")
        )->paginate($this->numpaginate);

        // Obtiene el mes actual
        $mes_actual = Carbon::now()->endOfMonth()->startOfDay();

        // Obtiene el reporte del mes actual
        $reporte_mes = MonthlyReport::where('date', $mes_actual)->first();

        if ($reporte_mes && $reporte_mes->weekly_reports->isNotEmpty()) {
            // Obtiene los ingresos y egresos de la semana actual
            $ingresos_semana = $reporte_mes->weekly_reports->first()->deposits ?? [];
            $egresos_semana = $reporte_mes->weekly_reports->first()->egress ?? [];

            // Calcula los totales de ingresos y egresos de la semana
            foreach ($ingresos_semana as $ingreso_semana) {
                $total_ingresos_semana += $ingreso_semana->value;
            }

            foreach ($egresos_semana as $egreso_semana) {
                $total_egresos_semana += $egreso_semana->value;
            }

            // Calcula los totales de ingresos y egresos del mes
            foreach ($reporte_mes->weekly_reports as $reporte_semana) {
                foreach ($reporte_semana->deposits as $ingreso) {
                    $total_ingresos_mes += $ingreso->value;
                }

                foreach ($reporte_semana->egress as $egreso) {
                    $total_egresos_mes += $egreso->value;
                }
            }

            // Calcula el balance de la semana
            $total_balance_semana = $total_ingresos_semana - $total_egresos_semana;
            $total_balance_mes = $total_ingresos_mes - $total_egresos_mes;
        }

        return view('livewire.dashboard.gestion-financiera.index-live', compact('ingresos', 'egresos', 'total_ingresos_semana', 'total_egresos_semana', 'total_balance_semana', 'total_ingresos_mes', 'total_egresos_mes', 'total_balance_mes'));
    }
}
