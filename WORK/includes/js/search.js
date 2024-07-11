const userCardTemplate = document.querySelector("[data-user-template]")
const userCardContainer = document.querySelector("[data-user-card-container]")
const searchInput = document.querySelector("[data-search]")

//searchInput.addEventListener("input", e=> {
    //const value = e.target.value.toLowerCase()
    //users.forEach(request => {
        //const isVisible = 
        //request.header.toLowerCase().includes(value) ||
        //request.dept.toLowerCase().includes(value) ||
        //request.fname.toLowerCase().includes(value)
      //  request.element.classList.toggle("hide", !isVisible)
    //})
//})



function addtolist(list, req_list) {
    
    const req = {
        header:list[13],
        dept: list[12], 
        fname: list[9]
    };
    req_list.push(req)
    console.log(req_list)
  }




