export default (path) => {
    var base_path = window._asset || '';
    return base_path+'/image/' + path;
}