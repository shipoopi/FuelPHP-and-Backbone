
var testBackbone = function()
{
    //We extend teh Backbone.Model prototype to build our own
    //Backbone.emulateHTTP = true;
    console.log("testBackbone(): Starting up...")
    Backbone.emulateJSON = true;

    //Backbone.sync = function(method, model) {
    //    alert("Method: " + method + " Data: " +JSON.stringify(model) );
    //    //return {'id':12};
    //    model.set({id:'12'}, {silent:true});
    //};
    var Donut = Backbone.Model.extend({
        defaults : {
            name : null,
            sprinkles : false,
            cream_filled : false
        },
        url : function() {
            // Impornant! It's got to know where to send its REST calls
            // In this case, POST to '/donuts' and PUT to '/donuts/:id'
            return this.id ? '/rest/donuts/' + this.id : '/rest/donuts';
        }
    });

    // Instantiating
    var bostonCream = new Donut({   // attributes to the Donut constructor will override the defaults
        name : "Boston Cream",
        cream_filled : true
    });
    //alert(bostonCream.get("name") + ": " + bostonCream.id);
    //bostonCream.set({sprinkles : true});
    //console.log("testBackbone(): ");
    //console.log("testBackbone(): isNew: " + bostonCream.isNew())
    //console.log("testBackbone(): saving...");
    //bostonCream.save(); // this will now POST to the RESTful interface.
    //console.log("testBackbone(): isNew: " + bostonCream.isNew())

    var newDonut = new Donut({
       id: '23'
    });
    console.log(" newDonut: " +JSON.stringify(newDonut) );
    newDonut.fetch({
        error: function(model, response) {
            console.log("error, response: " + JSON.stringify(response));
        },
        success: function(model, response) {
            console.log("success, response: " + JSON.stringify(response));
            console.log(" newDonut: " +JSON.stringify(newDonut) );
            newDonut.set({"name":"choc donut"});
            console.log(" newDonut: name changed to 'choc donut'");
            console.log(" newDonut: " +JSON.stringify(newDonut) );
            console.log(" calling save...'");
            newDonut.save();
            deleteit();
        }
    });

    var deleteit = function() {
        console.log("DeleteIT: '");
        console.log(" before delete, newDonut: " +JSON.stringify(newDonut) );
        newDonut.destroy({
            error: function(model, response) {
                console.log("error, response: " + JSON.stringify(response));
            },
            success: function(model, response) {
                console.log("success, response: " + JSON.stringify(response));
                console.log(" after delete, newDonut: " +JSON.stringify(newDonut) );
            }
        });
    }

};




/*
alert(bostonCream.get("name") + ": " + bostonCream.id);

bostonCream.set({
    sprinkles: false,
    name: "Boston Cream"
});
bostonCream.save(); // and  now its a PUT
*/
// it will put directly to "donuts/3" since thats the URI of the model now




var postData = function() {
    mydata = {"key1":"Value One","key2":"Value 2","key3":true};
    $.ajax({
        type: "POST",
        //contentType: "application/json",
        url: "/rest/donuts",
        //data: "json=" + "some data",
        data: jQuery.param( mydata ),
        processData: false,
        success: function(data){
            //alert('success: ' + data)
        },
        error: function (request,error){
            //alert('error: ' + error)
        }
    });
}

//postData();

var getData = function() {
    mydata = {"key1":"Value One","key2":"Value 2","key3":true};
    $.ajax({
        type: "GET",
        //contentType: "application/json",
        url: "/rest/donuts/",
        //data: "json=" + "some data",
        data: jQuery.param( mydata ),
        processData: false,
        success: function(data){
            alert('success: ' + data[0].name)
        },
        error: function (request,error){
            //alert('error: ' + error)
        }
    });
}

//getData();

$(document).ready(function(){
    //alert("ready");
   // mydata = [{"json":"Boston Cream","sprinkles":true,"cream_filled":true}];
   $("#home_button").click(function(event){
        //postData();
       //getData();
       testBackbone();
   });
 });
