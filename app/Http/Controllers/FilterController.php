<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filter;
use App\Http\Requests\FilterRequest;

class FilterController extends Controller
{
    public function index()
    {
        $filters = Filter::query()->orderBy('filter_name')->paginate(25);
        return view('filter.index', compact('filters'));
    }

    public function create()
    {
        return view('filter.create');
    }


    public function store(FilterRequest $request)
    {
        Filter::create(
            $request->validated()
        );
        return redirect()->route('filter.index');
    }

    public function show()
    {

    }

    public function edit(Filter $filter)
    {
        return view('filter.edit', compact('filter'));
    }

    public function update(
        FilterRequest $request,
        Filter  $filter
    ) {
        $filter->update($request->validated());
        return redirect()->route('filter.index');
    }

    public function destroy(Filter $filter)
    {
        $filter->delete();
        return redirect()->route('filter.index');
    }
}
