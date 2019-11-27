var READTHEDOCS_DATA = {
    "project": "laravel-guide", 
    "theme": "readthedocs", 
    "version": "latest", 
    "source_suffix": ".md", 
    "api_host": "https://readthedocs.org", 
    "language": "en", 
    "commit": "2f0b1713d1d338d56ea15000c5ca3d743028c2f9", 
    "docroot": "/home/docs/checkouts/readthedocs.org/user_builds/laravel-guide/checkouts/latest", 
    "builder": "mkdocs", 
    "page": null
}

// Old variables
var doc_version = "latest";
var doc_slug = "laravel-guide";
var page_name = "None";
var html_theme = "readthedocs";

READTHEDOCS_DATA["page"] = mkdocs_page_input_path.substr(
    0, mkdocs_page_input_path.lastIndexOf(READTHEDOCS_DATA.source_suffix));
