<?php
namespace Kmlpandey77\Label;
use Illuminate\Support\Facades\Cache;
use Kmlpandey77\Label\Models\Label as LabelModel;

class Label{

    public function get($labelId)
    {
        $locale = app()->currentLocale();
        list($page, $id) = explode(':', $labelId);

		$labels = Cache::remember('labels.'.$locale.'.' . $page, 30*24*60, function () use($page,$locale) {
			return LabelModel::select('labelid', 'value')->where('lang',$locale)->where('page', $page)->get()->pluck('value', 'labelid')->toArray();
		});

		if(isset($labels[$labelId])){
			$value = $labels[$labelId];
			return $value??$labelId;
		}
		return $labelId;
    }


}
