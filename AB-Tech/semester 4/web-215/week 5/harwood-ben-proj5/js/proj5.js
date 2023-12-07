'use strict'
/**********************
 *********************
NOTE: In my comments, I've referred to functions with their parenthesis. Example: someFunction()
That does not mean you should always use the parenthesis in your code. Sometime you would use someFunction (when referencing it) while other times you'd use someFunction() (when running it).
**********************
*********************/


// Global variables
/*
  Store the #style-picker element in a variable for use across multiple functions. The variable should be named: picker
*/
const picker = document.querySelector('#style-picker');


// SHOW PICKER MENU
/*
  - Bind a click listener to the #theme element, calling showPickerMenu() when clicked
  - Run showPickerMenu() after 5 seconds of page load
  - Create the showPickerMenu() function with a single statement - to show the picker menu via CSS display property
*/
const theme = document.querySelector('#theme');
theme.addEventListener('click', showPickerMenu);
window.addEventListener('load', () => {
  setTimeout(showPickerMenu, 5000)
})

/**
 * shows the stylesheet picker menu
 */
function showPickerMenu() {
  picker.style.display = 'block';
}


// LISTEN FOR BUTTON CLICKS
/*
  - Store all buttons in a variable
  - Loop through the buttons, binding a click listener to each
    The click listener should call handleOptions(), passing it the clicked button element
*/
const buttons = document.querySelectorAll('button');

buttons.forEach(button => {
  button.addEventListener('click', () => {
    handleOptions(button);
  })
})


// HANDLE OPTIONS
/**
 * determines which theme to switch to on button press
 * 
 * @param {HTMLElement} el - takes the passed html element and determines which theme to switch to using the id then calls the loadStyles function.
 */
function handleOptions(el) {
  /*
  - Switch with 4 cases plus a default
      For each case, call loadStyles, passing it the stylesheet name (minus the file extension), the button element itself, and a text string for page display. HINT: You can tell which button was clicked by it's ID.
  - If no theme button is clicked (I like the current theme), close the picker via CSS display property
  */
 switch (el.id) {
  case 'def':
    loadStyles(`theme-default`, el, 'default');
    break;
  case 'gray':
    loadStyles(`theme-grayscale`, el, 'grayscale');
    break;
  case 'hc':
    loadStyles(`theme-high-contrast`, el, 'high contrast');
    break;
  case 'clown':
    loadStyles(`theme-clown`, el, 'clown');
    break;
  case 'current':
    picker.style.display = 'none';
    break;
  default:
    loadStyles(`theme-default`, el, 'default');
 }
}

// LOAD STYLES
/**
 * enables all buttons except current selected changes the stylesheet to selected and changes the descriptor to reflect selected style then closes the style picker
 * 
 * @param {string} sheet - the name of the stylesheet to be used
 * @param {HTMLElement} btn - which button was clicked
 * @param {string} str - descriptor of the stylesheet to display
 */
function loadStyles(sheet, btn, str) {
  /*
  - Loop through the buttons, setting each one to enabled. 
  - HINT: The buttons are already stored in a global variable from earlier for easy access.
  - HINT: To enable a button, set its disable property to false
  - HINT: If you use an arrow function for the callback, this can be a single line of code.
  - Set the HREF of the appropriate link tag to the passed theme
  - Change the #theme text to that of the passed theme
  - Set the clicked button (passed to function) to disabled
  - Hide the picker box via CSS display property
  */
 buttons.forEach(button => button.disabled = false);
 let styleLink = document.querySelector('[data-style = theme]');
 styleLink.href = `css/${sheet}.css`;
 theme.textContent = `${str}`;
 btn.disabled = true;
 picker.style.display = 'none';
}

// COLOR MORPH SETUP
/*
  When morph box is clicked, call morph(), passing along the clicked button itself
    -HINT: Use an arrow function for the callback and you can do this is a single line of code
*/
const morphBox = document.querySelector('#morph');
morphBox.addEventListener('change', e => morph(e.target))


/*
  Plan ahead! Create a variable to store the interval ID. Name the variable: morphID
*/
let morphID;

// COLOR MORPH FUNCTION
/**
 *Enables or disables a morphing effect based on the state of a checkbox.
 * 
 * @param {HTMLElement} morphBox - The checkbox element that controls the morphing effect
 */
function morph(morphBox) {
  /* 
  - If the box is checked:
      - call randomizeDegrees every 5 seconds, storing the interval in the morphId variable
      - console log "turning ON morph ID 123" with the actual ID#
      - exit the function
  - Stop randomizeDegrees from running
  - Console log "turning OFF morph ID 123" with the actual ID#
  - Call changeColor, passing it 0 so that the color is reset
  */
 if(morphBox.checked) {
  morphID = setInterval(randomizeDegrees, 5000);
  console.log(`turning ON morph ID ${morphID}`);
  return;
 }
 console.log(`Turning OFF morph ID ${morphID}`);
 clearInterval(morphID);
 changeColor(0);
}

/**
 * Generate a random number between 0-360 (inclusive) and pass that number to changeColor()
 *  Note that any range will work, but it defaults to 0 - 360
 *  Why 0 and 360? Because that defines the full degree range of a circle, or the color wheel
 *  The generated number is passed to changeColor
 * @param {number} min minimum random number to generate, inclusive
 * @param {number} max maximum random number to generate, inclusive
 */
function randomizeDegrees(min = 0, max = 360) {
  let num = Math.floor(Math.random() * (max - min + 1) + min);
  changeColor(num);
}

/**
 * Apply CSS hue filter to HTML tag
 *  Uses the random number passed from randomizeDegrees to rotate that many degrees on the color wheel from the old/current color to a new color
 *  Uses CSS filter to change the color and CSS transition to 'animate' the color change
 * @param {num} degree value passed from randomizeDegrees
 */
function changeColor(degree) {
  document.querySelector('html').style.cssText = `filter: hue-rotate(${degree}deg); transition: all 5s;`;
}
