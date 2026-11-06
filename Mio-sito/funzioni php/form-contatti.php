<?php
class Contatti {
    private array $campi = [
        'nome'      => 'text',
        'cognome'   => 'text',
        'telefono'  => 'tel',
        'email'     => 'email',
        'oggetto'   => 'text'
    ];

    
    public function generaInput() {
        foreach ($this->campi as $nome => $tipo) {
            echo '<label>' . ucfirst($nome) . ': 
                    <input type="' . $tipo . '" name="' . $nome . '" id="' . $nome . '">
                  </label>';
        }
    }
}
?>