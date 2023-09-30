<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use App\Models\TalentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SavedTalentController extends Controller
{
    public function create(Request $request)
    {
        $talent = Talent::where('uuid', $request->uuid)->get()->first();
        if (!$talent->isSaved()) {
            TalentStatus::create([
                'talent_id' => $talent->id,
                'object_status_id' => 3
            ]);
        }
        echo json_encode("saved");
    }

    public function index()
    {
        $response = '';
        $talents = Talent::where('user_id', auth()->user()->id)->get();
        $response .= View::make("components.top_three_talents")->with('showAll', false)->render();

        $counter = 0;
        foreach ($talents as $talent) {
            if ($talent->isSaved()) {
                $response .= View::make("components.jobs_page_talent")->with([
                    'talent' => $talent
                ])->render();
                $counter++;
            }
        }
        if ($counter == 0) {
            $response .= View::make("components.no_saved_talents")->render();
        }
        echo json_encode($response);
    }
}
