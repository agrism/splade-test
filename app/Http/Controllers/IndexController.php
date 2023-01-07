<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\Facades\Toast;

class IndexController extends Controller
{
    public function __invoke(Request $request): View
    {
        if (!$request->noToast) {
            $this->toast($request);
        }

        $this->seo();

        sleep(1);

        return view('index', [
            'items' => Splade::onLazy(function () {
                $items = [];
                foreach (range(0,5) as $ignored){
                    $items[] = ['name' => uniqid()];
                }
                return $items;
            }),
        ]);
    }

    private function toast(Request $request): void
    {
        $toast = Toast::title('You are at Home!');

        switch ($request->type) {
            case 'danger':
                $toast->danger();
                break;
            case 'warning':
                $toast->warning();
                break;
        }

        if ($request->backdrop) {
            $toast->backdrop();
        }

        if ($request->leftTop) {
            $toast->leftTop();
        }

        if ($request->center) {
            $toast->center();
        }

        $toast->autoDismiss(2);
    }

    private function seo(): void
    {
        SEO::title('Laravel Splade Test')
            ->description('testing usage of Splade')
            ->keywords('laravel, splade, keywords');
    }
}
