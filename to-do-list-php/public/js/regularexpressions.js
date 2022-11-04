document.addEventListener('DOMContentLoaded', ()=> {

    document.getElementById('btnSearch').addEventListener('click', doSearch);
    document.getElementById('btnMatch').addEventListener('click', doMatch);
    document.getElementById('btnReplace').addEventListener('click', doReplace);


    // document.getElementById('btnReplace').addEventListener('click', doReplace);

});

function doSearch(ev) { // BOOLEAN YES OR NO
    ev.preventDefault();
    let re = new RegExp(document.getElementById('find').value, 'g'); // g global
    let txt = document.querySelector('.contentt').textContent;
    let output = document.querySelector('.output');
    if (re.test(txt)) {
        output.textContent = 'Found a match'
    }else {
        output.textContent = 'Not found a match'
    }
}


function doMatch(ev){ // RETURNS STRING ARRAY
    ev.preventDefault();
    let re = new RegExp(document.getElementById('find').value, 'g'); // g global
    let txt = document.querySelector('.contentt').textContent;
    let output = document.querySelector('.output');

    let match = re[Symbol.match](txt);

    if(match) {
        output.textContent = match;

    }else {
        output.textContent = "Not found"
    }
}


function doReplace(ev){ // RETURNS STRING ARRAY
    ev.preventDefault();
    let re = new RegExp(document.getElementById('find').value, 'g'); // g global
    let txt = document.querySelector('.contentt').textContent;
    let replace = document.getElementById('replace').value;
    let output = document.querySelector('.output');

    document.querySelector('.contentt').textContent = txt.replace(re, replace)
    output.textContent = 'Replace Finished'
    
}


//\bma(n|d)
