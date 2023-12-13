<?php

namespace App\Livewire\Dashboard\GestionFinanciera;

use App\Models\MonthlyReport;
use App\Models\WeeklyReport;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteMensual extends Component
{
    use WithPagination;
    public $search;
    public $numpaginate = 5;
    public $reporteMes = [];
    public $date;
    public $reporteid;
    public $ingresos = [];
    public $egresos = [];
    public $totalDiezmos = 0;
    public $totalOfrendas = 0;
    public $totalCaja = 0;
    public $totalCajaMenor = 0;
    public $totalingresos = 0;
    public $totalegresos = 0;
    public $Balance = 0;


    public function updatingSearch() #actualiza la tabla paginacion de la tabla al momento de hacer una busqueda
    {
        $this->dispatch('update_tables')->self(); //evento para actualizar la tabla mediante el metodo render
        $this->resetPage(); //refresca la paginacion
    }
    public function mount()
    {
        $this->reporteMesActual();
    }



    public function reporteMesActual()
    {
        //obtener el mes actual
        $mesActual = Carbon::now()->endOfMonth()->startOfDay();
        $reporteMes= MonthlyReport::where('date', $mesActual)->first();
        $this->showReporteMensual($reporteMes->id ?? null);
    }


    #[On('show')]
    public function showReporteMensual($id)
    {
        // Reiniciar todas las variables
        $this->reset();
    
        // Obtener el reporte mensual actual según el nuevo 'id'
        $reporteMensual = MonthlyReport::with('weekly_reports.deposits', 'weekly_reports.egress')->find($id);
    
        if ($reporteMensual) {
            // Asignar el 'id' y la fecha del nuevo reporte mensual encontrado
            $this->reporteid = $reporteMensual->id;
            $this->date = $reporteMensual->date;
    
            // Proceso para calcular los ingresos del mes
            $this->ingresos = $reporteMensual->weekly_reports->flatMap(function ($semana) {
                return $semana->deposits;
            });
    
            $this->totalDiezmos = $this->ingresos->where('type', 'Diezmo')->sum('value');
            $this->totalOfrendas = $this->ingresos->where('type', '!=', 'Diezmo')->sum('value');
    
            // Proceso para calcular los egresos del mes
            $this->egresos = $reporteMensual->weekly_reports->flatMap(function ($semana) {
                return $semana->egress;
            });
    
            $this->totalCaja = $this->egresos->where('type', 'Caja')->sum('value');
            $this->totalCajaMenor = $this->egresos->where('type', 'Caja Menor')->sum('value');
    
            // Calcular el total de ingresos
            $this->totalingresos = $this->totalDiezmos + $this->totalOfrendas;
            // Calcular el total de egresos
            $this->totalegresos = $this->totalCaja + $this->totalCajaMenor;

            $this->Balance =  $this->totalingresos - $this->totalegresos;
        }
    }
    
    

    public function render()
    {
         // Obtén los ingresos y egresos paginados
         $reportes = MonthlyReport::orderBy('date', 'desc')
         ->where(
             fn ($query) =>
             $query->where('id', 'like', "$this->search%")
                 ->orWhere('date', 'like', "$this->search%")

         )->paginate($this->numpaginate);

        return view('livewire.dashboard.gestion-financiera.reporte-mensual' , compact('reportes'));
    }
}
