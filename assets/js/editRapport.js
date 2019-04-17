$(function () {
    
    let tabs = $('ul.tabs');
    tabs.tabs();
    
    let tab = $(".tab");
    let anchor;
    
    //localStorage.removeItem("currentTab");
    
    if (storageAvailable('localStorage'))
    {
        
        if(localStorage.getItem("currentTab"))
        {
            tabs.tabs("select_tab", localStorage.getItem("currentTab"));
        }
        else
        {
            localStorage.setItem("currentTab", "general");
        }
    }
    else {
        
        console.log("localStorage non disponible");
    }
    
    tab.on("click", function () {
       
        console.log("Hey");
        anchor = $(this).attr("value");
        localStorage.setItem("currentTab", anchor);
    });
    
    function storageAvailable(type) {
        
        let storage;
        
        try {
            
            storage = window[type];
            let x = '__storage_test__';
            storage.setItem(x, x);
            storage.removeItem(x);
            return true;
        }
        catch(e) {
            
            return e instanceof DOMException && (
                    // everything except Firefox
                e.code === 22 ||
                // Firefox
                e.code === 1014 ||
                // test name field too, because code might not be present
                // everything except Firefox
                e.name === 'QuotaExceededError' ||
                // Firefox
                e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
                // acknowledge QuotaExceededError only if there's something already stored
                (storage && storage.length !== 0);
        }
    }

});