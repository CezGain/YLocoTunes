<?php

namespace App\Http\Controllers;

use App\Models\FiltersLine;
use App\Models\FilterTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class FilterTemplateController extends Controller
{
    public function getAllFiltersTemplatesFromUserId($userId,$type)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->getAuthIdentifier() == $userId) {
            $filtersTemplatesByUser = $user->favoriteFiltersTemplates;

            $filtersTemplates = [];

            foreach ($filtersTemplatesByUser as $template) {
                if($template['type']==$type) {
                    $template->load('lines');
                    $lines = json_encode($template->lines->pluck('filterName')->unique()->toArray());

                    $filtersTemplates[] = [
                        'template' => $template,
                        'lines' => $lines,
                    ];
                }
            }
            return $filtersTemplates;
        } else {
            return [];
        }
    }

    public function store()
    {
        $user = Auth::user();
        dump($_GET);
        // Create a new FilterTemplate
        $filterTemplate = new FilterTemplate(['nameTemplate'=>$_GET['nameTemplate'],'type'=>$_GET['type']]);
        $user->favoriteFiltersTemplates()->save($filterTemplate);

        // Loop through the filters and create/save FiltersLine models
        $filtersArray = json_decode($_GET['styleData'], true);
        foreach ($filtersArray as $filter) {
            $filtersLine = new FiltersLine(['filterName' => $filter, 'filter_template_id' => $filterTemplate->id]);
            $filtersLine->save();
        }
        return Redirect::to('/');
    }







}
