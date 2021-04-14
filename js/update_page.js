window.onload = () => {
    if (window.localStorage) {
        //Check for firstload varaiable, create one if not found, then refresh page
        if (!localStorage.getItem('firstLoad')) {
            localStorage['firstLoad'] = true;
            window.location.reload();
            return;
        }
        //Remove firsload variable if found
        localStorage.removeItem('firstLoad');
    }
}