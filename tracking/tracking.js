/**
 * tracking
 */
var tracking = function(){};

tracking.url = "tracking/tracking.php";
tracking.page_url = window.location.href;

tracking.add = function(type){
	$.post(this.url, {type: type, url: this.page_url}, function (result) {});
};

tracking.pv = function(){
	$.post(this.url, {type: "pv", url: this.page_url}, function (result) {});
};

tracking.click = function(id){
	$.post(this.url, {type: id, url: this.page_url}, function (result) {});
};

tracking.share = function(type){
	$.post(this.url, {type: type, url: this.page_url}, function (result) {});
};




// add tracking of this page
tracking.pv();