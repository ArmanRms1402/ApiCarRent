<?php

class MisCarros
{
    public function index()
    {
        #hacemos llamar al modelo 
        $misCarros = ModelosRenta::index("carros");

        return json_encode($misCarros);
    }
}
