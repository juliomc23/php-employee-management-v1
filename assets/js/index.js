// GLOBAL VARIABLES
const tableBodyEl = document.getElementById('table-body');
const table = document.getElementById('table');
const addNewEmpBtnEl = document.getElementById('addNewEmp');
const createEmpButton = document.getElementById('createEmpButton');
const empFormInputs = document.querySelectorAll('[form-emp]');


// Functions



const getEmps = async () => {
    const res = await fetch('.././src/library/employeeController.php');
    const data = await res.json()
  
    return data;
  }
const deleteEmpId = (e) => {

    const btnId = e.currentTarget.getAttribute('data');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const sendReq = async () => {
                const req = await fetch(`.././src/library/employeeController.php`, {
                    method: 'DELETE',
                    body: JSON.stringify(+btnId)
                });
                const res = await req.json()
            }
            sendReq();
            clearRow(e);
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )


        }
    })

}
  
// Toggeling add button 
const addEmpFormHandler = () => {

    const addEmployeeForm = document.getElementById('addEmployeeForm');
    addEmployeeForm.classList.toggle('toggle');

    if (addEmployeeForm.classList == 'toggle') {
        addNewEmpBtnEl.textContent = '+'
        addNewEmpBtnEl.style.background = "green";
    } else {
        addNewEmpBtnEl.textContent = 'x';
        addNewEmpBtnEl.style.background = "#F55353";
    }

}
const createNewEmp = async (e) => {
    e.preventDefault();
    const validation = await validateForm();
    const newEmp = getEmpFormValues();
    if(!validation){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please verify all details are correct and that your email does not exsit already',
          })
    }else{
        const req = await fetch(`.././src/library/employeeController.php`, {
            method: 'POST',
            body: JSON.stringify(newEmp),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        clearTable()
        clearForm();
        Swal.fire(
            'Success!',
            'Employee was added correctly',
            'success'
          )
        showEmp();
    }
  }

function createTableRowWihtEmp(id, name, email, age, streetAddress, city, state, postalCode, phoneNumber) {
    const trEl = document.createElement('tr')

    const nameData = document.createElement('td');
    nameData.textContent = name;

    const emailData = document.createElement('td');
    emailData.textContent = email;

    const ageData = document.createElement('td');
    ageData.textContent = age;

    const street_nData = document.createElement('td');
    street_nData.textContent = streetAddress;

    const cityData = document.createElement('td');
    cityData.textContent = city;

    const stateData = document.createElement('td');
    stateData.textContent = state;

    const postalData = document.createElement('td');
    postalData.textContent = postalCode;


    const phoneData = document.createElement('td');
    phoneData.textContent = phoneNumber;


    const deleteBtnEl = document.createElement('td');
    const btn = document.createElement('button');
    btn.setAttribute('data', id)
    btn.setAttribute('class', 'delete__Button')

    deleteBtnEl.appendChild(btn);

    const editBtnEl = document.createElement('td');
    const editBtn = document.createElement('a')
    const iconEditEl = document.createElement('i');
    editBtn.setAttribute('href', `.././src/library/employeeController.php?id=${id}`)
    editBtn.setAttribute('class', 'edit__button')
    iconEditEl.setAttribute('class', 'fa-solid fa-pen-to-square')

    editBtn.append(iconEditEl)
    editBtnEl.appendChild(editBtn);


    trEl.appendChild(nameData);
    trEl.appendChild(emailData);
    trEl.appendChild(ageData);
    trEl.appendChild(street_nData);
    trEl.appendChild(cityData);
    trEl.appendChild(stateData);
    trEl.appendChild(postalData);
    trEl.appendChild(phoneData);
    trEl.appendChild(deleteBtnEl);
    trEl.appendChild(editBtnEl);


    return trEl;
}


const showEmp = async () => {
    const emps = await getEmps();
    
    emps.map(emp => {
        const { id, name, email, age, streetAddress, city, state, postalCode, phoneNumber, gender, lastName } = emp;
        const empRow = createTableRowWihtEmp(id, name, email, age, streetAddress, city, state, postalCode, phoneNumber, gender, lastName);
        tableBodyEl.appendChild(empRow);
    })
    const btnsdelete = document.querySelectorAll('[data]')
    btnsdelete.forEach(btn => btn.addEventListener('click', deleteEmpId));

}

const clearForm = () => {
    const newEmpFormEl = document.getElementById('addEmployeeForm');
    Array.from(newEmpFormEl.children).map(el => {
        Array.from(el.children).forEach(el => el.value = '')
    })
    newEmpFormEl.classList.toggle('toggle');
    addNewEmpBtnEl.textContent = '+';
}


const clearRow = (e) => {

    if (table.hasChildNodes()) {
        tableBodyEl.removeChild(e.target.parentElement.parentElement)
    }
}

const clearTable = () => {
    Array.from(tableBodyEl.children).map(el => {
        if(!el.hasAttribute('id')) {
            tableBodyEl.removeChild(el)
        }
    })
}


const getEmpFormValues = () => {

    const id = document.getElementById('id').value = '';
    const name = document.getElementById('name').value;
    const lastName = document.getElementById('lastName').value = '';
    const gender = document.getElementById('gender').value = '';
    const email = document.getElementById('email').value;
    const age = document.getElementById('age').value;
    const streetAddress = document.getElementById('streetAddress').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const postalCode = document.getElementById('postalCode').value;
    const phoneNumber = document.getElementById('phoneNumber').value;

    const data = {
        id, name, lastName, email, age, gender, streetAddress, city, state, postalCode, phoneNumber
    }

    return data;
}

// Validation helpers

const validateForm = async () => {
    const validationArr = new Array()

    const name = empFormInputs[0]
    const email = empFormInputs[1]
    const age = empFormInputs[2]
    const streetAddress = empFormInputs[3]
    const city = empFormInputs[4]
    const state = empFormInputs[5]
    const postalCode = empFormInputs[6]
    const phoneNumber = empFormInputs[7]

    const regex = {
        emailReg: /^\w+([\.-\_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/, //checking for correct address
        firstNameReg: /^[a-zA-ZÀ-ÿ\s]{1,20}$/, // not allwoing numbers
        ageReg: /^(1[89]|[2-9]\d)$/, // age from 18 - 99
        phoneNumberReg: /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/, // allowing coutnry code and (-)
        addressReg: /[A-Za-z0-9'\.\-\s\,]/, // eliminates symbols which are not part of an address
        cityReg: /^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/, // allowing cities with special carachters
        stateReg: /^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/, // allowing states with special carachters
    }
    
    const { emailReg, firstNameReg, ageReg, addressReg, cityReg, stateReg, phoneNumberReg } = regex;
    if(firstNameReg.test(name.value)){
        validationArr.push(true)
    }
    if(emailReg.test(email.value)){
        const isEmailDuplicated = await checkEmail(email.value)
        if(isEmailDuplicated) {
            validationArr.push(true)
        }
       
    }
    if(ageReg.test(age.value)) {
        validationArr.push(true)
    }
    if(addressReg.test(streetAddress.value)) {
        validationArr.push(true)
    }
    if(cityReg.test(city.value)) {
        validationArr.push(true)
    }
    if(stateReg.test(state.value)) {
        validationArr.push(true)
    }
    if(phoneNumberReg.test(phoneNumber.value)) {
        validationArr.push(true)
    }
    if(postalCode.value.length != 0) {
        validationArr.push(true)
    }

    return validationArr.length == 8 ? true : false;
}

const checkEmail = async (email) => {
    let isEmailOK = false;
    const emps = await getEmps();
    emps.forEach(emp => {
        const {email: dbEmail} = emp
        const comparedEmail = email.trim()
        if(dbEmail === comparedEmail) {
            isEmailOK = false
        } else {
            isEmailOK = true
        }
    })
    return isEmailOK;
}



// events



addNewEmpBtnEl.addEventListener('click', addEmpFormHandler);

createEmpButton.addEventListener('click', createNewEmp)



//  on load
showEmp();





