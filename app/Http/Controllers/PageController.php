<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getProducts(): array
    {
        return require app_path('Data/products.php');
    }

    private function getProjects(): array
    {
        return require app_path('Data/projects.php');
    }

    public function home()
    {
        $products = $this->getProducts();
        $projects = $this->getProjects();

        // Featured products: 8 unique categories
        $featured = collect($products)
            ->unique('category')
            ->take(8)
            ->values()
            ->all();

        // Featured projects: top 6 projects
        $featuredProjects = collect($projects)
            ->take(6)
            ->all();

        return view('pages.home', compact('featured', 'featuredProjects'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function products(Request $request)
    {
        $products   = $this->getProducts();
        $categories = [
            'all'                  => 'All Products',
            'valves'               => 'Valves',
            'fittings'             => 'Fittings & Joints',
            'pipes'                => 'uPVC Pipes',
            'fire'                 => 'Fire Safety',
            'access'               => 'Access & Drainage',
            'gate-valves'          => 'Gate Valves',
            'butterfly-valves'     => 'Butterfly Valves',
            'check-valves'         => 'Check Valves',
            'air-release-valves'   => 'Air Release Valves',
            'angle-float-valve'    => 'Angle / Float Valves',
            'wye-strainer'         => 'WYE Strainers',
            'fire-hydrant'         => 'Fire Hydrants',
            'saddle-clamp'         => 'Saddle Clamps',
            'dresser-coupling'     => 'Dresser Couplings',
            'adaptor-end-cap'      => 'Adaptors & End Caps',
            'valve-boxes'          => 'Valve Boxes',
            'di-manhole'           => 'D.I Manholes',
        ];

        return view('pages.products', compact('products', 'categories'));
    }

    public function projects()
    {
        $projects   = $this->getProjects();
        $categories = [
            'all'            => 'All Projects (' . count($projects) . ')',
            'utility'        => 'Water Districts & Utilities (' . count(array_filter($projects, fn($p)=>$p['category']==='utility')) . ')',
            'infrastructure' => 'Infrastructure & Pumping (' . count(array_filter($projects, fn($p)=>$p['category']==='infrastructure')) . ')',
            'commercial'     => 'Commercial & Real Estate (' . count(array_filter($projects, fn($p)=>$p['category']==='commercial')) . ')',
        ];

        return view('pages.projects', compact('projects', 'categories'));
    }

    public function contact()
    {
        $products = $this->getProducts();
        $productNames = array_column($products, 'name');

        return view('pages.contact', compact('productNames'));
    }

    public function specSheet($id)
    {
        $products = $this->getProducts();
        $product  = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product specification sheet not found.');
        }

        return view('pages.spec_sheet', compact('product'));
    }
}
