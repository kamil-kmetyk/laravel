import './bootstrap';
import { Core } from './core';

function appReady(fn) {
  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    setTimeout(fn, 1);
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

appReady(() => {
  new Core();
});
