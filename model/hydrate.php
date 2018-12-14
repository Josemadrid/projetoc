<?php


trait hydrate{


public function hydrate($datas)
    {
        foreach ($datas as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (is_callable([$this, $method]))
            {
                $this->$method($value);
                
            }
        }
    }
}