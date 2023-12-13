<?php

namespace App\Livewire\Dashboard\GestionFinanciera;

use App\Models\WeeklyReport;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteSemanal extends Component
{
    use WithPagination;
    public $search;
    public $numpaginate = 5;
    public $reporteSemana = [];
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


    public function updatingSearch() #actualiza la tabla paginacion de la tabla al momento de hacer una busqueda
    {
        $this->dispatch('update_tables')->self(); //evento para actualizar la tabla mediante el metodo render
        $this->resetPage(); //refresca la paginacion
    }
    public function mount()
    {
        $this->reporteSemanaActual();
    }



    public function reporteSemanaActual()
    {
        //obtener el mes actual
        $semanaActual = Carbon::now()->endOfWeek()->startOfDay();
        $reporteSemana = WeeklyReport::where('date', $semanaActual)->first();
        $this->showReporteSemana($reporteSemana->id ?? null);
    }


    #[On('show')]
    public function showReporteSemana($id)
    {
        // Reiniciar todas las variables
        $this->reset();
    
        // Obtener el reporte actual según el nuevo 'id'
        $this->reporteSemana = WeeklyReport::with(['deposits', 'egress'])->find($id);
    
        if ($this->reporteSemana) {
            // Asignar el 'id' y la fecha del nuevo reporte semanal encontrado
            $this->reporteid = $this->reporteSemana->id;
            $this->date = $this->reporteSemana->date;
    
            // Proceso para calcular los ingresos de la semana
            $this->ingresos = $this->reporteSemana->deposits;
            $this->totalDiezmos = $this->ingresos->where('type', 'Diezmo')->sum('value');
            $this->totalOfrendas = $this->ingresos->where('type', '!=', 'Diezmo')->sum('value');
    
            // Proceso para calcular los egresos de la semana
            $this->egresos = $this->reporteSemana->egress;
            $this->totalCaja = $this->egresos->where('type', 'Caja')->sum('value');
            $this->totalCajaMenor = $this->egresos->where('type', 'Caja Menor')->sum('value');
    
            // Calcular el total de ingresos
            $this->totalingresos = $this->totalDiezmos + $this->totalOfrendas;
            // Calcular el total de egresos
            $this->totalegresos = $this->totalCaja + $this->totalCajaMenor;
        }
    }
    


    #[On('update_tables')]
    public function render()
    {

        // Obtén los ingresos y egresos paginados
        $reportes = WeeklyReport::orderBy('date', 'desc')
            ->where(
                fn ($query) =>
                $query->where('id', 'like', "$this->search%")
                    ->orWhere('date', 'like', "$this->search%")

            )->paginate($this->numpaginate);



        return view('livewire.dashboard.gestion-financiera.reporte-semanal', compact('reportes'));
    }
}
