import Vue from 'vue';


Vue.filter('isUrl',(string)=>{
    let url;
    try {
        url = new URL(string);
    } catch (_) {
        return false;
    }
    return url.protocol === "http:" || url.protocol === "https:";
});

Vue.filter('baseUrl',(val)=> {
    if(val|isUrl)
        return val;
    else
        return `${window.location.origin}/${val}`;
});