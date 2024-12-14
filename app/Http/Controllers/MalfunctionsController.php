<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Malfunction;
use App\Models\Machine;
use App\Models\Status;
use App\Models\User;

class MalfunctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //De storingen worden gesorteerd op basis van hun aanmaakdatum van nieuwste naar oudste.
        $malfunctions = Malfunction::with(['machine', 'status', 'user']) ->whereNull('finished_at')->orderBy('created_at', 'desc')->get();        
        return view('malfunctions.index', compact('malfunctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $machines = Machine::all();//Dit haalt alle rijen op uit de machines-tabel in de database. dit heeft ook te maken met de dropdpown functie 
        $statuses = Status::all();
        $users = User::all(); 
        return view('malfunctions.create', compact('machines', 'statuses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de ingevoerde gegevens. Controleer of velden bestaan in de database
        $this->validate($request, [
            'machine_id' => 'required|exists:machines,id', // de exists functie zorgt ervoor de meegegeven id ook in de database bestaat
            'status_id' => 'required|exists:statuses,id',
            'user_id' => 'nullable|exists:users,id',
            'description' => 'required',
            'finished_at' => 'nullable|date',
        ]);

        // Maak een nieuwe malfunction en vul de velden met de input uit de request
        $malfunction = new Malfunction();
        $malfunction->machine_id = $request->machine_id; 
        //De eigenschap machine_id van het Malfunction-object wordt ingesteld met de waarde die in het formulier is ingediend onder machine_id.
        $malfunction->status_id = $request->status_id;
        $malfunction->user_id = $request->user_id;
        $malfunction->description = $request->description;
        $malfunction->finished_at = $request->finished_at;
        $malfunction->save(); // Sla de nieuwe storing op in de database

        return redirect()->route("malfunctions.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Zoek de malfunction op basis van het ID
        $malfunction = Malfunction::findOrFail($id);
        $machines = Machine::all();
        $statuses = Status::all();//  zorgen ervoor dat de benodigde data uit de database beschikbaar is in de view
        $users = User::all();
        return view('malfunctions.edit', compact('malfunction', 'machines', 'statuses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Net als bij `store` valideert dit de input om te voorkomen dat ongeldige gegevens worden opgeslagen
        $this->validate($request, [
            'machine_id' => 'required|exists:machines,id',
            'status_id' => 'required|exists:statuses,id',
            'user_id' => 'nullable|exists:users,id',
            'description' => 'required',
            'finished_at' => 'nullable|date',
        ]);

        // Zoek de malfunction op die moet worden bijgewerkt
        $malfunction = Malfunction::findOrFail($id);
        // Werk de velden van de malfunction bij
        $malfunction->machine_id = $request->machine_id;
        $malfunction->status_id = $request->status_id;
        $malfunction->user_id = $request->user_id;
        $malfunction->description = $request->description;
        $malfunction->finished_at = $request->finished_at;
        $malfunction->save(); // Sla de wijzigingen op in de database

        // Redirect naar de overzichtspagina met een succesbericht
        return redirect()->route("malfunctions.index")->with('success', 'Malfunction successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Malfunction::destroy($id);
        return redirect()->route('malfunctions.index');
    }
}
