<?php
namespace GeniusSystems\CloudEvent;

/**
 * Created by PhpStorm.
 * User: jerryamatya
 * Date: 10/7/20
 * Time: 16:19
 */
class Event
{
    protected $specversion, $type, $source, $date, $datacontenttype, $data;

    function __construct(array $data)
    {

        $this->specversion = isset($data['specversion']) ? $data['specversion'] : null;
        $this->type = isset($data['type']) ? $data['type'] : null;
        $this->source = isset($data['source']) ? $data['source'] : null;
        $this->date = date('Y-m-d H:i:s');
        $this->datacontenttype = isset($data['datacontenttype']) ? $data['datacontenttype'] : null;
        $this->data = isset($data['data']) ? $data['data'] : null;
    }


}