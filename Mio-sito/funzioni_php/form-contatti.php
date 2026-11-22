<?php
class Contatti {
    private array $campi = [
        'nome'      => 'text',
        'cognome'   => 'text',
        'telefono'  => 'tel',
        'email'     => 'email',
        'oggetto'   => 'text'
    ];

    public function generaInput(array $valori = []) {
        foreach ($this->campi as $nome => $tipo) {
            $valore = htmlspecialchars($valori[$nome] ?? '');
            echo '<label>' . ucfirst($nome) . ': 
                    <input type="' . $tipo . '" name="' . $nome . '" id="' . $nome . '" value="' . $valore . '">
                  </label>';
        }
    }
}
?>