
// Initialize an array to store selected curator IDs
// var selectedCurators = [];
var selectedInputValuesObject = {};
var inputValuesObject = {};
var contributionValuesObject = {};

function selectCuratorVerifiedCoverage(id)
{
    var curatorId = atob(id);
    var requestFrom =  $('#click_C_V_C'+curatorId).attr('data-value');

    // Check if curatorId is already in the array
    // var index = selectedCurators.indexOf(curatorId);

    var curatorName = $('#curatorNameIDs'+curatorId).val();
    // console.log(curatorName);
    if(requestFrom === 'first')
    {
        $('#selectC_V_C'+curatorId).css('background-color',"#e26e6b");
        $('#click_C_V_C'+curatorId).attr('data-value','second');

        var inputValue = $('#verifiedCoverageIds'+curatorId).val(curatorId);
        var c_PriceValue = $('#contribution_V_C_IDs'+curatorId).val();

        // Add the current input value to the array
        inputValuesObject[curatorId] = inputValue;
        contributionValuesObject[curatorId] = c_PriceValue;

        selectedInputValuesObject[curatorId] = {
            'id': curatorId,
            'usc_credit': parseFloat(c_PriceValue) || 0
        };

        var successMsg = curatorName + ' was added to the selection.';
        toastr.success(successMsg);

    }else if(requestFrom === 'second')
    {
        $('#selectC_V_C'+curatorId).css('background-color',"#02b875");
        $('#click_C_V_C'+curatorId).attr('data-value','first');

        var inputValue = $('#verifiedCoverageIds'+curatorId).val('');
        delete selectedInputValuesObject[curatorId];
        delete inputValuesObject[curatorId];
        delete contributionValuesObject[curatorId];

        var errorMsg = curatorName + ' was removed from the selection.';
        toastr.error(errorMsg);
        // selectedCurators.splice(inputValue, 1);
    }
    // console.log("Input Values Array:", inputValuesObject);
    // console.log("contributionValuesObject Array:", contributionValuesObject);
    // sum of selected pros contribution
    // Sum the values in the object
    var sumTotalContribution = 0;

    $.each(contributionValuesObject, function(key, value) {
        sumTotalContribution += parseInt(value, 10) || 0;
    });
    // console.log("sumTotalContribution Array:", sumTotalContribution);
    var selectedCount = Object.keys(inputValuesObject).length
    if(selectedCount === 0)
    {
        $('#showCuratorProsSelect').html('');
        $('#showContributionTotal').css('display','none');
        $('.show_C_Amount').html('');
        $('#verifiedCoverageIDS').val('');
        return false;
    }else {
        $('#showCuratorProsSelect').html(selectedCount + ' Pros Selected');
        $('#showContributionTotal').css('display','block');
        $('.show_C_Amount').html(sumTotalContribution);

        // add verified coverage selected array in id
        // Convert the object to a JSON string
        var jsonString = JSON.stringify(Object.values(selectedInputValuesObject));
        $('#verifiedCoverageIDS').val(jsonString);
        // console.log("selectedInputValuesObject :", jsonString);
        // console.log("selectedInputValuesObject :", selectedInputValuesObject);
        // console.log("count :", selectedCount);
    }

}
