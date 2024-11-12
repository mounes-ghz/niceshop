<span data-toggle="tooltip" title="{{ is_null($date) ? '' : locale_date($date, 'toFormattedDateString') }}">
    {!! is_null($date) ? '&mdash;' : $date->diffForHumans() !!}
</span>
