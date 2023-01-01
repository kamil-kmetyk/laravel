<?php

namespace App\View\Components\UI;

use Illuminate\View\Component;
use Illuminate\View\View;

class RectButton extends Component {
  public function __construct(public string $title = '', public string $icon = '', public string $route = '') {}

  public function render(): View {
    return view('components.ui.rect-button');
  }

}
