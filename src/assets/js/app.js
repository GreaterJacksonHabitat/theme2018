import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).foundation();

import './lib/foundation-off-canvas';

// Couldn't get importing it the normal way to work, so let's just use the dist file
import '../../../node_modules/masonry-layout/dist/masonry.pkgd.js';

import './lib/masonry.js';