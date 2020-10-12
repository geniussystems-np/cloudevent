<?php
namespace GeniusSystems\CloudEvent;

/**
 * Created by PhpStorm.
 * User: jerryamatya
 * Date: 10/7/20
 * Time: 16:19
 */
class Event implements \JsonSerializable
{
    protected $spec;

    function __construct(array $spec)
    {
      $this->spec = $spec;
    }

    public function jsonSerialize()
    {
      return array_filter([
        "id"              => $this->spec['id'] ?? uniqid(),
        "source"          => $this->spec['source'] ?? $_SERVER['REQUEST_URI'],
        "specversion"     => "1.0",
        "type"            => $this->spec['type'] ?? $this->defaultType(),
        "time"            => $this->spec['date'] ?? (new \DateTime)->format(\DateTime::RFC3339),
        "datacontenttype" => $this->spec['datacontenttype'] ?? null,
        "subject"         => $this->spec['subject'] ?? null,
        "data"            => $this->spec['data'] ?? null,
      ], function($value) {
        return $value !== null;
      });
    }

    protected function defaultType()
    {
      return implode("." ,array_reverse(explode(".", $_SERVER['SERVER_NAME']))) . ".genericevent";
    }
}
