const keyword = document.querySelector('.keyword');
const cari = document.querySelector('.cari');
const container = document.querySelector('.container');

keyword.addEventListener('keyup',function () {
    
    // membuat object ajax
    let xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET','ajax/vapor.php?keyword='+keyword.value, true);
    xhr.send();
})
