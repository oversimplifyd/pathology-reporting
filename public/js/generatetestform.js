/**
 * Created by Administrator on 2/27/2015.
 */
(function () {

    var testFormsCount = 1;

    $("#select_children").on("click", function(){

        generateForm(testFormsCount);
        testFormsCount++;
    });

    function generateForm (index) {
        var testForm = $("<div class=\"test\"><div class=\"form-group\"><label for=\"description\" class=\"control-label col-sm-4 \">Test Description</label><div class=\"col-sm-8\"><textarea name=\"description"+index+"\" class=\"form-control\" required>{{ old('description')}}</textarea></div></div><div class=\"form-group\"><label for=\"purpose\" class=\"control-label col-sm-4 \">Test Purpose</label><div class=\"col-sm-8\"><textarea name=\"purpose"+index+"\" class=\"form-control\" required>{{ old('purpose')}}</textarea></div></div><div class=\"form-group\"><label for=\"result\" class=\"control-label col-sm-4 \">Test Result</label><div class=\"col-sm-8\"><textarea name=\"result"+index+"\" class=\"form-control\" required>{{ old('result')}}</textarea></div></div><div class=\"form-group\"><label for=\"received_at\" class=\"control-label col-sm-4 \">Date Received</label><div class=\"col-sm-8\"><input name=\"received_at"+index+"\" class=\"form-control\" value=\"{{ old('received_at')}}\" required></div></div><div class=\"form-group\"> <label for=\"completed_at\" class=\"control-label col-sm-4 \">Date Completed</label><div class=\"col-sm-8\"><input name=\"completed_at"+index+"\" class=\"form-control\" value=\"{{ old('completed_at')}}\" required></div></div><a href=\"#\" id=\"remove-test"+index+"\" class=\"btn btn-danger btn-xs pull-right\">Remove Test</a></div>"),
            container = $('test-container').append(testForm);

        $('#remove-test'+index).addEventListener('click', function(event){
            event.preventDefault();
            console.log("got here");
        });
    }

/*    function generateForm(val)
    {
        var val = val;
        var main_div = $("<div></div>").attr('id', index+"main_div"),
            sumbitButton = $("<button class=\"btn btn-primary btn-changebg\">Submit</button>").attr({
                type: "submit",
                name: "submit"
            });
        $('#birth_count').css({
            padding: '25px'
        })
// create the childForm
        // var childForm = $("<form></form>").attr({action: "child_form_handler.php", method: "POST"});

        var testForm = $("<div></div>").attr('id', 'birth_count_2');

        for(var index = 1; index < val+1; index+=1){

// Creates the div that contains the label and input for the child name
            var childNameDiv = $("<div class=\"form-group\"></div>"),
                nameLabel = $("<label>Child Name:</label>"),
                nameInput = $("<input/>").attr({
                    type: "text",
                    name: index+"_child_name",
                    id: "child_name",
                    class: "form-control",
                    placeholder: "Jide Owolabi"
                });
            childNameDiv.append(nameLabel).append(nameInput);

// Creates the div that contains the label and input for the child Date of Birth
            var childBirthDiv = $("<div class=\"form-group\"></div>"),
                nameLabel = $("<label>Date of Birth:</label>"),
                nameInput = $("<input/>").attr({
                    type: "text",
                    name: index+"_dob",
                    class: "form-control dob",
                    placeholder: "Year-Month-Date"
                });
            childBirthDiv.append(nameLabel).append(nameInput);

// Creates the div that contains the label and input for the child type of Place of birth
            var childTypeDiv = $("<div class=\"form-group\"></div>"),
                nameLabel = $("<label>Type of Place of Birth:</label>"),
                nameInput = $("<input/>").attr({
                    type: "text",
                    name: index+"_tpob",
                    id: "_tpob",
                    class: "form-control",
                    placeholder: "Hospital"
                });
            childTypeDiv.append(nameLabel).append(nameInput);

// Creates the div that contains the label and input for the child name of place of birth
            var childPlaceDiv = $("<div class=\"form-group tpob\"></div>"),
                nameLabel = $("<label>Name of Place of Birth:</label>"),
                nameInput = $("<input/>").attr({
                    type: "text",
                    name: index+"_npob",
                    id: "_tnob",
                    class: "form-control",
                    placeholder: "Ajah General Hospital"
                });
            childPlaceDiv.append(nameLabel).append(nameInput);
            birthCount.append(childNameDiv).append(childBirthDiv).append(childTypeDiv).append(childPlaceDiv)
        }
        birthCount.append(sumbitButton);
        $("#birth_count").append(birthCount);

        var scriptElem = $("<script></script>", {
            html: '$(".dob").datepicker({dateFormat: "yy-mm-dd"})'
        });

        scriptElem.appendTo($('body'));
    }*/
}());