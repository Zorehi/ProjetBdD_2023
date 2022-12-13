/**
 * Permet de savoir si un element est affiché
 * 
 * @param {HTMLElement} elem Element HTML à tester
 * @returns Booleen
 */
 const isVisible = elem => elem.getAttribute("data-status") == "visible" ? true : false;

 /**
 * 
 * @param {String} button 
 * @param {String} test 
 * @returns 
 */
const isMatch = (string, test) => (typeof(string) == 'string' && typeof(test) == 'string') ? string.toLowerCase().includes(test.toLowerCase()) : false;