var str = 'Яблоки_круглые_и_яблоки_сочные';
var newstr = str.replace(/\_/g, ' ');
console.log(newstr);

//шаблон заполнения на дату рождения
$(function () {
    $('#birthDate').mask("99.99.9999");
});

//чтобы менять картинки зубов и их значения
function caries(toothId) {
    $(toothId).attr('src', 'caries.png');
    $(toothId).attr('value', 'caries');
}

function pulpit(toothId) {
    $(toothId).attr('src', 'pulpit.png');
    $(toothId).attr('value', 'pulpit');
}

function peredont(toothId) {
    $(toothId).attr('src', 'paradont.png');
    $(toothId).attr('value', 'paradont');
}

// Собираем все поля связанные с длинными описаниями в tooth-info
let tooth_info = $('.tooth-info');
tooth_info.click(function (e) {
    let field_id = e.target.id;
    handlerField(field_id)

});
// handlerField - понять какое поле нажали
// Атрибут data-id нужен для того,чтобы выводить связанные данные
// (Диагноз Кариес=>будут выводится данные связанные с жалобами на кариес=>и.т.д)
function handlerField(field_id) {
    let data_id = $('#diagnosis').attr('data-id')
    switch (field_id) {
        case "diagnosis":
            getDescription("diagnosis", data_id);
            break;
        case "complaint":
            getDescription("complaint", data_id);
            break;
        case "anamnesis":
            getDescription("anamnesis", data_id);
            break;
        case "objectively":
            getDescription("objectively", data_id);
            break;
        case "treatment":
            getDescription("treatment", data_id);
            break;
        case "recommend":
            getDescription("recommend", data_id);
            break;
    }
}

//AJAX запрос на получение данных
function getDescription(field_id, data_id) {
    $('#descriptions').html('');
    $.ajax({
        url: '../php/patient_card/Take_description.php',
        type: 'POST',
        data: {
            field_id: field_id,
            id: data_id
        },
        dataType: 'JSON',
        success: function (data) {
            handlerData(data, field_id);
        },
        error: function (data) {
            console.log(data);
        }
    });
}

// HandlerData -обрабатывает полученные данные, смотрит если есть id,
// то это значит что пришли данные диагноз, если нет то это остальные поля
function handlerData(data, field_id) {
    for (let index = 0; index < data.length; index++) {
        let obj = data[index];
        if (!obj.id) {
            anotherDescription(obj, field_id)
        } else {
            diagnosisDescription(obj)
        }
    }
}

//Создает список радио кнопок
function diagnosisDescription(obj) {
    let checkboxes = `<div class="form-check">
                <input class="form-check-input diagnosis-description" type="radio" name="radio-buttons"
                 id=${obj.id} value="${obj.description}" checked onclick="getCheckedRadioDiagnosis()">
                <label class="form-check-label">
                    ${obj.description}
                </label>
            </div>`
    $('#descriptions').append(checkboxes)
}

//Создает список checkboxes
function anotherDescription(obj, field_id) {
    let checkboxes = `<div class="form-check">
                <input class="form-check-input another-checkboxes-description" type="checkbox" value="${obj.description}"
                onclick="getCheckedCheckboxesAnother(${field_id})">
                <label class="form-check-label">
                    ${obj.description}
                </label>
            </div>`;
    $('#descriptions').append(checkboxes)
}

//Выбранные данные передает в поле диагноз
function getCheckedRadioDiagnosis() {
    let diagnosis = document.getElementById('diagnosis');
    diagnosis.value = "";
    let radios = document.getElementsByClassName('diagnosis-description');
    for (let index = 0; index < radios.length; index++) {
        if (radios[index].checked) {
            diagnosis.value = radios[index].value.replace(/\_/g, ' ');
            let dataId = radios[index].id;
            console.log(dataId);
            diagnosis.setAttribute('data-id', dataId);
        }
    }
}

function getCheckedCheckboxesAnother(field_id) {
    let field = field_id;
    let checkboxes = $('.another-checkboxes-description');
    checkboxes.on('click change', function () {
        let values = [];
        checkboxes.filter(':checked').each(function () {
            values.push(this.value);
        });
        $(field).val(values.join(','));
    });
}

function getTemplateDescription(template) {
    $.ajax({
        url: '../php/patient_card/Take_template.php',
        type: 'POST',
        data: {
            template: template,
        },
        dataType: 'JSON',
        success: function (data) {
            let values = [];
            $('#diagnosis').val(data[0].description);
            console.log(data);
            for (let index = 0; index < data[1].length; index++) {
                values.push(data[1][index].description);
            }
            $('#complaint').val(values.join(', '));
            values = [];
            for (let index = 0; index < data[2].length; index++) {
                values.push(data[2][index].description);
            }
            $('#anamnesis').val(values.join(''));
            values = [];
            $('#objectively').val(data[3].description);
            $('#treatment').val(data[4].description);
            $('#recommend').val(data[5].description);

        },
        error: function (data) {
            console.log("BAD");
            console.log(data);
        }
    })
}

// Выбранные данные передает в field_id

/*function getCheckedCheckboxesAnother(field_id) {
    let field = field_id;
    let checkboxes = document.getElementsByClassName('another-checkboxes-description');
    for (let index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            field.append(checkboxes[index].value);
        }
    }
}

function getUncheckedCheckboxesAnother(field_id) {
    let field = field_id;
    let checkboxes = document.getElementsByClassName('another-checkboxes-description');
    for (let index = 0; index < checkboxes.length; index++) {
        if (!checkboxes[index].checked) {
            //field.textContent = field.textContent.replace(checkboxes[index].value, " ");
            field.value = checkboxes[index].value.replace(/\_/g, ' ');
        }
    }
}*/


//Что все связанно с Диагнозом
//////////////////////////////////////////////
/*function showDiagnosis(){
    $('.categoryDiagnosis').removeAttr('hidden')
    $('.categoriesComplaint').attr("hidden","true");
    $('.categoryAnamnesis').attr("hidden","true");
    $('.categoriesObjectively').attr("hidden","true");
    $('.categoriesTreatment').attr("hidden","true");
    $('.categoriesRecommend').attr("hidden","true");
}
function showCariesDiagnosis() {
    $('div.caries_diagnosis').removeAttr("hidden");
    $('div.paradont_diagnosis').attr("hidden","true");
    $('div.pulpit_diagnosis').attr("hidden","true");
}
function showParadontDiagnosis() {
    $('div.caries_diagnosis').attr("hidden","true");
    $('div.paradont_diagnosis').removeAttr("hidden");
    $('div.pulpit_diagnosis').attr("hidden","true");
}
function showPulpitDiagnosis(){
    $('div.caries_diagnosis').attr("hidden","true");
    $('div.paradont_diagnosis').attr("hidden","true");
    $('div.pulpit_diagnosis').removeAttr("hidden");
}

function getCheckedRadioDiagnosis() {
    let diagnos = document.getElementById('diagnosis');
    diagnos.innerHTML = ' ';
    let radios = document.getElementsByClassName('radio');
    for (let index = 0; index < radios.length; index++) {
        if (radios[index].checked) {
            diagnos.prepend(radios[index].value);
        }
    }
}
//////////////////////////////////////////////

//Что все связанно с Жалобами
//////////////////////////////////////////////
function showComplains(){
    $('.categoriesDiagnosis').attr("hidden","true");
    $('.categoriesComplaint').removeAttr("hidden");
    $('.categoriesAnamnesis').attr("hidden","true");
    $('.categoriesObjectively').attr("hidden","true");
    $('.categoriesTreatment').attr("hidden","true");
    $('.categoriesRecommend').attr("hidden","true");
}

function showCariesComplaint(){
    $('div.caries_complaints').removeAttr("hidden");
    $('div.peredont_complaints').attr("hidden","true");
    $('div.pulpit_complaints').attr("hidden","true");
}
function showPeradontComplaint(){
    $('div.caries_complaints').attr("hidden","true");
    $('div.peredont_complaints').removeAttr("hidden");
    $('div.pulpit_complaints').attr("hidden","true");
}
function showPulpitComplaint(){
    $('div.caries_complaints').attr("hidden","true");
    $('div.peredont_complaints').attr("hidden","true");
    $('div.pulpit_complaints').removeAttr("hidden");
}

function getCheckedCheckBoxesComplaints(){
    let complaint = document.getElementById('complaint');
    complaint.innerHTML = ' ';
    let checkboxes = document.getElementsByClassName('checkbox');
    for (let index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            complaint.append(checkboxes[index].value + ',');
        }
    }
}
//////////////////////////////////////////////

//Что все связанно с Анамнезисом
//////////////////////////////////////////////
function showAnamnesis() {
    $('.categoryDiagnosis').attr("hidden","true");
    $('.categoriesComplaint').attr("hidden","true");
    $('.categoryAnamnesis').removeAttr("hidden");
    $('.categoriesObjectively').attr("hidden","true");
    $('.categoriesTreatment').attr("hidden","true");
    $('.categoriesRecommend').attr("hidden","true");
}
function showCommonAnamnesis() {
    $('div.anamnesis_list').removeAttr("hidden");
}
function getCheckedRadioAnamnesis() {
    let anamnesis = document.getElementById('anamnesis');
    anamnesis.innerHTML = ' ';
    let radios = document.getElementsByClassName('radio');
    for (let index = 0; index < radios.length; index++) {
        if (radios[index].checked) {
            anamnesis.prepend(radios[index].value);
        }
    }
}
//////////////////////////////////////////////

//Что все связанно с Объективным
//////////////////////////////////////////////
function showObjectively() {
    $('.categoriesDiagnosis').attr("hidden","true");
    $('.categoriesComplaint').attr("hidden","true");
    $('.categoriesAnamnesis').attr("hidden","true");
    $('.categoriesObjectively').removeAttr("hidden");
    $('.categoriesTreatment').attr("hidden","true");
    $('.categoriesRecommend').attr("hidden","true");

}
function showCariesObjectively(){
    $('div.caries_objectively').removeAttr("hidden","true");
}

function showEasyCariesObjectively() {
    $('div.easy_caries_objectively').removeAttr("hidden");
    $('div.normal_caries_objectively').attr("hidden","true");
    $('div.bad_caries_objectively').attr("hidden","true");
    $('div.hard_caries_objectively').attr("hidden","true");
}
function showNormalCariesObjectively() {
    $('div.easy_caries_objectively').attr("hidden","true");
    $('div.normal_caries_objectively').removeAttr("hidden");
    $('div.bad_caries_objectively').attr("hidden","true");
    $('div.hard_caries_objectively').attr("hidden","true");
}
function showBadCariesObjectively() {
    $('div.easy_caries_objectively').attr("hidden","true");
    $('div.normal_caries_objectively').attr("hidden","true");
    $('div.bad_caries_objectively').removeAttr("hidden");
    $('div.hard_caries_objectively').attr("hidden","true");
}
function showHardCariesObjectively() {
    $('div.easy_caries_objectively').attr("hidden","true");
    $('div.normal_caries_objectively').attr("hidden","true");
    $('div.bad_caries_objectively').attr("hidden","true");
    $('div.hard_caries_objectively').removeAttr("hidden");
}
function getCheckedCheckBoxesObjectively(){
    let objectively = document.getElementById('objectively');
    objectively.innerHTML = ' ';
    let checkboxes = document.getElementsByClassName('checkbox_objectively');
    for (let index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            objectively.append(checkboxes[index].value + ',');
        }
    }
}
//////////////////////////////////////////////

//Что все связанно с Лечением
//////////////////////////////////////////////
function showTreatment() {
    $('.categoriesDiagnosis').attr("hidden","true");
    $('.categoriesComplaint').attr("hidden","true");
    $('.categoriesAnamnesis').attr("hidden","true");
    $('.categoriesObjectively').attr("hidden","true");
    $('.categoriesTreatment').removeAttr("hidden");
    $('.categoriesRecommend').attr("hidden","true");
}
function showCariesTreatment () {
    $('div.caries_treatment').removeAttr("hidden","true");
}

function showEasyCariesTreatment() {
    $('div.easy_caries_treatment').removeAttr("hidden");
    $('div.normal_caries_treatment').attr("hidden","true");
    $('div.bad_caries_treatment').attr("hidden","true");
    $('div.hard_caries_treatment').attr("hidden","true");
}
function showNormalCariesTreatment() {
    $('div.easy_caries_treatment').attr("hidden","true");
    $('div.normal_caries_treatment').removeAttr("hidden");
    $('div.bad_caries_treatment').attr("hidden","true");
    $('div.hard_caries_treatment').attr("hidden","true");
}
function showBadCariesTreatment() {
    $('div.easy_caries_treatment').attr("hidden","true");
    $('div.normal_caries_treatment').attr("hidden","true");
    $('div.bad_caries_treatment').removeAttr("hidden");
    $('div.hard_caries_treatment').attr("hidden","true");
}
function showHardCariesTreatment() {
    $('div.easy_caries_objectively').attr("hidden","true");
    $('div.normal_caries_objectively').attr("hidden","true");
    $('div.bad_caries_objectively').attr("hidden","true");
    $('div.hard_caries_objectively').removeAttr("hidden");
}
function getCheckedCheckBoxesTreatment(){
    let treatment = document.getElementById('treatment');
    treatment.innerHTML = ' ';
    let checkboxes = document.getElementsByClassName('checkbox_treatment');
    for (let index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            treatment.append(checkboxes[index].value + ',');
        }
    }
}
//////////////////////////////////////////////

//Что все связанно с Рекомендации
//////////////////////////////////////////////
function showRecommend() {
    $('.categoriesDiagnosis').attr("hidden","true");
    $('.categoriesComplaint').attr("hidden","true");
    $('.categoriesAnamnesis').attr("hidden","true");
    $('.categoriesObjectively').attr("hidden","true");
    $('.categoriesTreatment').attr("hidden","true");
    $('.categoriesRecommend').removeAttr("hidden");
}
function showCommonRecommend() {
    $('div.recommend_list').removeAttr("hidden");
}
function getCheckedCheckBoxesRecommend(){
    let recommend = document.getElementById('recommend');
    recommend.innerHTML = ' ';
    let checkboxes = document.getElementsByClassName('checkbox_recommend');
    for (let index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            recommend.append(checkboxes[index].value + ',');
        }
    }
}

/*
Хотел сделать алгоритм - брать данные из поля title из таблицы(кариес, и.т.п) из бд diagnosis
//Пока что не буду это добавлять в проект потому что, когда уже отправляется полученные данные обратны,
//То сами диагнозы изменяются на цифры, я хоть и сделал JSON.parse, это никак не помогает.
Возможно это из-за PDO.
*/
/*https://qna.habr.com/q/288681
 УЗнал Что можно в json_encode можно вставить эту конструкцию(<li>

              <input type='radio' class='radio' checked name='chose' value=" .$row['title']. "
              onclick='getCheckedRadioDiagnosis()'> " . $row['title'] . "
              </li>")
  Это выводит все то что мне надо, но название до сих пор выводится ввиде цифр и букву - наверное шифрование со стороны PDO
  ПОэтому придется Опять эту оставить,Пойду дальше делать однотипные функции.
*/

/*
function showDiagnosis() {
    $.ajax({
        url: '../php/upload_data.php',
        type: 'POST',
        data:'diagnosis',
        sendAjaxForm:'json',
        success:function(data){
          JSON.parse(data);
          $('#caries_list').append(data);
        }
    })
}
*/

// эти функции меняют Ряды Зубов
function changeRowOfTeethOnSmall() {
    let smallRowTeeth = `<div class="row">
                    <!--Правый ряд-->
                    <div class="col-6 upRowTeethRight pr-2 d-flex justify-content-end zub_row_left">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth55' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth55">
                            <li><button onclick='caries("#tooth55")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth55")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth55")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">55</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth54' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth54">
                            <li><button onclick='caries("#tooth54")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth54")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth54")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">54</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth53' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth53">
                            <li><button onclick='caries("#tooth53")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth53")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth53")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">53</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth52' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth52">
                            <li><button onclick='caries("#tooth52")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth52")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth52")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">52</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth51' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth51">
                            <li><button onclick='caries("#tooth51")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth51")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth51")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">51</span>
                      </div>
                    </div>
                     <!--Левый ряд-->
                    <div class="col-6  pr-2 d-flex justify-content-end zub_row_right">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth61' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth61">
                            <li><button onclick='caries("#tooth61")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth61")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth61")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">61</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth62' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth62">
                            <li><button onclick='caries("#tooth62")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth62")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth62")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">62</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth63' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth63">
                            <li><button onclick='caries("#tooth63")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth63")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth63")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">63</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth64' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth64">
                            <li><button onclick='caries("#tooth64")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth64")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth64")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">64</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth65' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth65">
                            <li><button onclick='caries("#tooth65")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth65")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth65")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">65</span>
                      </div>
                    </div>
                  </div>
                   <div class="row" style="height: 8px;"></div>
                   <div class="row d-flex align-items-center">
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                            <div class="col-1 p-0 d-flex align-items-center justify-content-center">
                                <button onclick="changeRowOfTeethOnBig()">
                                  <img src="../journals/zub.svg" style="width: 30px; height: 30px;">
                                </button>
                            </div>
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                          </div>
                          <div class="row" style="height: 8px;"></div>
                 <div class="row">
                    <!--Правый ряд-->
                    <div class="col-6  pr-2 d-flex justify-content-end zub_row_left">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth85' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth85">
                            <li><button onclick='caries("#tooth85")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth85")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth85")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">85</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth84' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth84">
                            <li><button onclick='caries("#tooth84")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth84")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth84")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">84</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth83' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth83">
                            <li><button onclick='caries("#tooth83")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth83")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth83")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">83</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth82' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth82">
                            <li><button onclick='caries("#tooth82")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth82")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth82")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">82</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth81' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth81">
                            <li><button onclick='caries("#tooth81")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth81")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth81")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">81</span>
                      </div>
                    </div>
                     <!--Левый ряд-->
                    <div class="col-6  pr-2 d-flex justify-content-end zub_row_right">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth71' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth71">
                            <li><button onclick='caries("#tooth71")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth71")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth71")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">71</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth72' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth72">
                            <li><button onclick='caries("#tooth72")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth72")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth72")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">72</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth73' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth73">
                            <li><button onclick='caries("#tooth73")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth73")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth73")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">73</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth74' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth74">
                            <li><button onclick='caries("#tooth74")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth74")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth74")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">74</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth75' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth75">
                            <li><button onclick='caries("#tooth75")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth75")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth75")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">75</span>
                      </div>
                    </div>
                  </div>`;
    if ($('#indicator').value = '1') {
        $('.rowOfTeeth').empty();
        $('.rowOfTeeth').html(smallRowTeeth);
        $('#indicator').attr('value', '2');
    }
}

function changeRowOfTeethOnBig() {
    let bigRowTeeth = `<div class="row">
                    <!--Правый ряд-->
                    <div class="col-6 upRowTeethRight pr-2 d-flex justify-content-end zub_row_left">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth18' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth18">
                            <li><button onclick='caries("#tooth18")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth18")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth18")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub"><button id='nubmer18' onclick="getToothToBeTreated('#tooth1',this)">18</button></span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                           <input id='tooth17' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth17">
                            <li><button onclick='caries("#tooth17")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth17")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth17")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">17</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth16' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth16">
                            <li><button onclick='caries("#tooth16")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth16")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth16")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">16</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth15' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth15">
                            <li><button onclick='caries("#tooth15")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth15")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth15")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">15</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth14' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth14">
                            <li><button onclick='caries("#tooth14")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth14")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth14")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">14</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth13' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth13">
                            <li><button onclick='caries("#tooth13")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth13")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth13")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">13</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth12' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth12">
                            <li><button onclick='caries("#tooth12")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth12")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth12")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">12</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth11' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth11">
                            <li><button onclick='caries("#tooth11")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth11")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth11")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">11</span>
                      </div>
                    </div>
                     <!--Левый ряд-->
                    <div class="col-6  pr-2 d-flex justify-content-end zub_row_left">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth21' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth21">
                            <li><button onclick='caries("#tooth21")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth21")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth21")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">21</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                           <input id='tooth22' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth22">
                            <li><button onclick='caries("#tooth22")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth22")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth22")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">22</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth23' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth23">
                            <li><button onclick='caries("#tooth23")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth23")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth23")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">23</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth24' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth24">
                            <li><button onclick='caries("#tooth24")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth24")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth24")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">24</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth25' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth25">
                            <li><button onclick='caries("#tooth25")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth25")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth25")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">25</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth26' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth26">
                            <li><button onclick='caries("#tooth26")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth26")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth26")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">26</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth27' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth27">
                            <li><button onclick='caries("#tooth27")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth27")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth27")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">27</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth28' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth28">
                            <li><button onclick='caries("#tooth28")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth28")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth28")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">28</span>
                      </div>
                    </div>
                  </div>
                  <!--Делиметер-->
                   <div class="row" style="height: 8px;"></div>
                   <div class="row d-flex align-items-center">
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                            <div class="col-1 p-0 d-flex align-items-center justify-content-center">
                                <button onclick="changeRowOfTeethOnSmall()">
                                  <img src="../journals/zub.svg" style="width: 30px; height: 30px;">
                                </button>
                            </div>
                            <div class="col" style="height: 1px; background-color: #BDBDBD"></div>
                          </div>
                          <div class="row" style="height: 8px;"></div>
                   <!--Нижний ряд зубов-->
                   <div class="row">
                    <!--Правый ряд-->
                    <div class="col-6  pr-2 d-flex justify-content-end zub_row_left">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth48' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth48">
                            <li><button onclick='caries("#tooth48")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth48")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth48")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">48</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                           <input id='tooth47' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth47">
                            <li><button onclick='caries("#tooth47")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth47")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth47")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">47</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth46' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth46">
                            <li><button onclick='caries("#tooth46")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth46")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth46")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">46</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth45' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth45">
                            <li><button onclick='caries("#tooth45")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth45")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth45")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">45</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth44' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth44">
                            <li><button onclick='caries("#tooth44")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth44")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth44")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">44</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth43' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth43">
                            <li><button onclick='caries("#tooth43")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth43")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth43")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">43</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth42' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth42">
                            <li><button onclick='caries("#tooth42")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth42")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth42")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">42</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth41' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth41">
                            <li><button onclick='caries("#tooth41")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth41")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth41")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">41</span>
                      </div>
                    </div>
                     <!--Левый ряд-->
                    <div class="col-6  pr-2 d-flex justify-content-end zub_row_left">
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth31' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth31">
                            <li><button onclick='caries("#tooth31")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth31")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth31")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">31</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                           <input id='tooth32' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth32">
                            <li><button onclick='caries("#tooth32")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth32")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth32")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">32</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth33' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth33">
                            <li><button onclick='caries("#tooth33")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth33")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth33")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">33</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth34' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth34">
                            <li><button onclick='caries("#tooth34")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth34")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth34")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">34</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth35' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth35">
                            <li><button onclick='caries("#tooth35")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth35")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth35")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">35</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth36' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth36">
                            <li><button onclick='caries("#tooth36")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth36")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth36")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">36</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth37' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth37">
                            <li><button onclick='caries("#tooth37")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth37")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth37")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">37</span>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <div class="dropdown">
                            <input id='tooth38' type="image" class=" btn-sm dropright" src="../journals/tooth.png" data-bs-toggle="dropdown" aria-expanded="false"/>
                          <ul class="dropdown-menu" aria-labelledby="tooth38">
                            <li><button onclick='caries("#tooth38")'  class="dropdown-item tooth" >Caries</button></li>
                            <li><button onclick='pulpit("#tooth38")'  class="dropdown-item tooth" >Pulpit</button></li>
                            <li><button onclick='paradont("#tooth38")'  class="dropdown-item tooth" >Paradont</button></li>
                          </ul>
                        </div>
                        <span class="d-flex justify-content-center podzub">38</span>
                      </div>
                    </div>
                  </div> `
    if ($('#indicator').value = '2') {
        $('.rowOfTeeth').empty();
        $('.rowOfTeeth').html(bigRowTeeth);
        $('#indicator').attr('value', '2');
    }
}

// Функция для распечатки заполненых полей
$('#submit').click(function () {
    $('.form-control').removeClass('invalid')
    let error = formValidate();
    if (error === 0) {
        alert("Данные проверены");
        printData();
    } else {
        alert("Ошибка")
    }

//  Проверка полей
    function formValidate() {
        let error = 0
        let fullName = $('#fullName');
        let birthDate = $('#birthDate');
        let homeAddress = $('#homeAddress');
        let age = $('#age');
        let workPlace = $('#workPlace');
        let tooth = $('#tooth');
        let diagnosis = $('#diagnosis');
        let complaint = $('#complaint');
        let anamnesis = $('#anamnesis');
        let objectively = $('#objectively');
        let treatment = $('#treatment');
        let recommend = $('#recommend');

        if (!inputTest(fullName)) {
            formAddError(fullName)
            error++
        } else if (!inputTest(birthDate)) {
            formAddError(birthDate)
            error++
        } else if (!inputTest(homeAddress)) {
            homeAddress.addClass('invalid');
            error++
        } else if (!inputTest(age)) {
            age.addClass('invalid');
            error++
        } else if (!inputTest(workPlace)) {
            workPlace.addClass('invalid');
            error++
        } else if (!inputTest(tooth)) {
            tooth.addClass('invalid');
            error++
        } else if (!inputTest(diagnosis)) {
            diagnosis.addClass('invalid');
            error++
        } else if (!inputTest(complaint)) {
            complaint.addClass('invalid');
            error++
        } else if (!inputTest(anamnesis)) {
            anamnesis.addClass('invalid');
            error++
        } else if (!inputTest(objectively)) {
            objectively.addClass('invalid');
            error++
        } else if (!inputTest(treatment)) {
            treatment.addClass('invalid');
            error++
        } else if (!inputTest(recommend)) {
            recommend.addClass('invalid');
            error++
        }
        console.log(error);
        return error;
    }

// Распечатывает заполненые данные
    function printData() {
        let windowForPrint = window.open();
        let printBlock = `
<form class="print"
    <h4>ИП "КАЖИБЕКОВ"</h4>
    <h5>Ф.И.О.:${$("#fullName").val()}</h5>
    <h5>Дата рождения:${$("#birthDate").val()}</h5>
    <h5>Дом.адрес:${$("#homeAddress").val()}</h5>
    <h5>Возраст:${$("#age").val()}</h5>
    <h5>Место работы:${$("#workPlace").val()}</h5>
    
    <br>
    <h5>Зубы,которые личились:${$("#tooth").val()}</h5>
    <h5>Диагноз:${$("#diagnosis").val()}</h5>
    <h5>Жалобы:${$("#complaint").val()}</h5>
    <h5>Анамнезис:${$("#anamnesis").val()}</h5>
    <h5>Объективно:${$("#objectively").val()}</h5>
    <h5>Лечение:${$("#treatment").val()}</h5>
    <h5>Рекомендации:${$("#recommend").val()}</h5>
</form>`;
        windowForPrint.document.write(printBlock);
        windowForPrint.print();
    }

// Проверка полей на заполненость
    function inputTest(input) {
        if (input.val() === '') {
            console.log(456);
            return false
        } else {
            console.log(123);
            return true;
        }
    }

// Добавляет красный бордер если ошибка
    function formAddError(input) {
        input.addClass('invalid');
    }

});

//После Нажатия на кнопку "Сохранить"-> ajax запрос в базу чтобы добавить новые данные
function insertData() {

    $.ajax({
        url: '../php/patient_card/insert_data_patient.php',
        type: 'POST',
        data: {
            fullName: $('#fullName').val(),
            birthDate: $('#birthDate').val(),
            homeAddress: $('#homeAddress').val(),
            age: $('#age').val(),
            workPlace: $('#workPlace').val(),

            tooth18: $('#tooth18').val(),
            tooth17: $('#tooth17').val(),
            tooth16: $('#tooth16').val(),
            tooth15: $('#tooth15').val(),
            tooth14: $('#tooth14').val(),
            tooth13: $('#tooth13').val(),
            tooth12: $('#tooth12').val(),
            tooth11: $('#tooth11').val(),

            tooth21: $('#tooth21').val(),
            tooth22: $('#tooth22').val(),
            tooth23: $('#tooth23').val(),
            tooth24: $('#tooth24').val(),
            tooth25: $('#tooth25').val(),
            tooth26: $('#tooth26').val(),
            tooth27: $('#tooth27').val(),
            tooth28: $('#tooth28').val(),

            tooth48: $('#tooth48').val(),
            tooth47: $('#tooth47').val(),
            tooth46: $('#tooth46').val(),
            tooth45: $('#tooth45').val(),
            tooth44: $('#tooth44').val(),
            tooth43: $('#tooth43').val(),
            tooth42: $('#tooth42').val(),
            tooth41: $('#tooth41').val(),

            tooth31: $('#tooth31').val(),
            tooth32: $('#tooth32').val(),
            tooth33: $('#tooth33').val(),
            tooth34: $('#tooth34').val(),
            tooth35: $('#tooth35').val(),
            tooth36: $('#tooth36').val(),
            tooth37: $('#tooth37').val(),
            tooth38: $('#tooth38').val(),

            diagnosis: $('#diagnosis').val(),
            complaint: $('#complaint').val(),
            objectively: $('#objectively').val(),
            treatment: $('#treatment').val(),
            recommend: $('#recommend').val(),
        },
        dataType: 'JSON',
        success: function (data) {
            let res;
            res = JSON.parse(data);
            if (res === 'good') {
                alert('Карточка Успешно Сохранена');
            }
        }

    })
}