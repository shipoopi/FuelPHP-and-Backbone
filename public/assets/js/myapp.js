/**
 * User: jsidhu
 * Date: 2/28/11
 * Time: 8:18 PM
 * To change this template use File | Settings | File Templates.
 */


    Backbone.emulateJSON = true;

    var FlashDrive = Backbone.Model.extend({
        defaults : {
            name : null,
            brand : null,
            capacity : null,
            price : null,
            description : null
        },
        url : function() {
            return this.id ? '/rest/flashdrives/' + this.id : '/rest/flashdrives';
        }
    });


    var fetchDrive = function() {
        var aDrive = new FlashDrive ({
           id: '99'
        });
        aDrive.fetch({
            error: function(model, response) {
                console.log("error, response: " + JSON.stringify(response));
            },
            success: function(model, response) {
                console.log("success, response: " + JSON.stringify(response));
                console.log(" aDrive: " +JSON.stringify(aDrive) );
                console.log(" Drive Name: " + aDrive.get("name"));
                console.log(" Drive Brand: " + aDrive.get("brand"));
                console.log(" Drive Capacity: " + aDrive.get("capacity"));
                console.log(" Drive Price: " + aDrive.get("price"));
                console.log(" Drive Description: " + aDrive.get("description"));
            }
        });
    };



    var createDrive = function() {
        var cruzer = new FlashDrive({
            name : "Cruzer",
            brand : "SanDisk",
            capacity : "16GB",
            price : "29.99",
            description : "SanDisk 16GB USB 2.0 Flash Drive"
        });
        /*
            right now, our model hasnt been saved. It does not have an id,
            and calling isNew() will return true
        */

        console.log("testBackbone(): id   : " + cruzer.get("id"));
        console.log("testBackbone(): isNew: " + cruzer.isNew());

        cruzer.save(null, {
            error: function(model, response) {
                console.log("Failed to create Model.");
                console.log("Response: " + JSON.stringify(response));
            },
            success: function(model, response) {
                console.log("Model created successfuly.");
                console.log("Response: " + JSON.stringify(response));
                /*
                    if the model was saved, it should have an id, calling isNew returns false
                */
                console.log("testBackbone(): id   : " + cruzer.get("id"));
                console.log("testBackbone(): isNew: " + cruzer.isNew());
                updatePrice();
            }
        });
    };
    
    var updatePrice = function() {
        cruzer.set({price:'24.99'});
        cruzer.save(null, {
            error: function(model, response) {
                console.log("Failed to update Model.");
                console.log("Response: " + JSON.stringify(response));
            },
            success: function(model, response) {
                console.log("Model updated successfuly.");
                console.log("Response: " + JSON.stringify(response));
                deleteDrive();
            }
        });
    };

    var deleteDrive = function() {
        cruzer.destroy({
            error: function(model, response) {
                console.log("error, response: " + JSON.stringify(response));
            },
            success: function(model, response) {
                console.log("success, response: " + JSON.stringify(response));
            }
        });
    };

    





$(document).ready(function(){
   fetchDrive();
   $("#home_button").click(function(event){
        fetchDrive();
   });
 });
