<?php

namespace App\View\Components\UI;

use Illuminate\View\Component;
use Illuminate\View\View;

class Card extends Component {
  public function __construct(public string $title = '', public mixed $stat = '') {}

  public function render(): View {
    return view('components.ui.card');
  }

}
