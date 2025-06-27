window.addEventListener("load", function(){
  try {

    getequationThemeObject = localStorage.getItem("theme");
    getParseObject = JSON.parse(getequationThemeObject)
    ParsedObject = getParseObject;

    if (ParsedObject.settings.layout.darkMode) {

      var Theme = 'dark';
    } else {
      
      var Theme = 'dark';
    }

    /*
        =============================================
            Perfect Scrollbar | Notifications
        =============================================
    */
    const ps = new PerfectScrollbar(document.querySelector('.mt-container'));



    /**
     * =================================================================================================
     * |     @Re_Render | Re render all the necessary JS when clicked to switch/toggle theme           |
     * =================================================================================================
     */

    document.querySelector('.theme-toggle').addEventListener('click', function() {

      getequationThemeObject = localStorage.getItem("theme");
      getParseObject = JSON.parse(getequationThemeObject)
      ParsedObject = getParseObject;

      // console.log(ParsedObject.settings.layout.darkMode)

      if (ParsedObject.settings.layout.darkMode) {
          
      } else {
      }
     
  })


  } catch(e) {
    // statements
    console.log(e);
  }

})