<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiCollection extends ResourceCollection {
    /**
     * Customize the response for the resource collection.
     *
     * @return void
     */
    public function toArray(Request $request) {
        $query = $request->query();
        $data = config('anvil.responses.list');
        $replacements = [
            // meta
            '{meta.total}' => $this->resource->total(),
            '{meta.per_page}' => $this->resource->perPage(),
            '{meta.count}' => $this->resource->count(),

            // pages
            '{page.first}' => 1,
            '{page.current}' => $this->resource->currentPage(),
            '{page.next}' => $this->resource->currentPage() + 1,
            '{page.last}' => $this->resource->lastPage(),

            // links
            '{link.first}' => $this->resource->appends($query)->url(1),
            '{link.current}' => $this->resource->appends($query)->url($this->resource->currentPage()),
            '{link.next}' => $this->resource->appends($query)->nextPageUrl(),
            '{link.prev}' => $this->resource->appends($query)->previousPageUrl(),
            '{link.last}' => $this->resource->appends($query)->url($this->resource->lastPage()),
            '{data}' => $this->collection,
        ];

        // build data accounding to the pattern
        array_walk_recursive($data, function (&$item, $key) use ($replacements) {
            $item = array_key_exists($item, $replacements) ? $replacements[$item] : $item;
        });

        return $data;
    }
}
