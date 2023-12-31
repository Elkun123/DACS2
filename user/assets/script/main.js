//header
try {
  const btnSearch = document.querySelector(".btn-search");
  const textSearch = document.querySelector(".text-search");
  const navbar = document.querySelector(".navbar");
  const btnBar = document.querySelector("#menu-btn");

  btnSearch.addEventListener("click", () => {
    if (textSearch.classList.contains("show-search")) {
      textSearch.classList.remove("show-search");
    } else {
      textSearch.classList.add("show-search");
    }
  });

  btnBar.addEventListener("click", () => {
    if (navbar.classList.contains("active")) {
      navbar.classList.remove("active");
    } else {
      navbar.classList.add("active");
    }
  }); 
} catch (error) {
}

//kiểm tra đăng nhập thành công
try {
  const btnUser = document.querySelector(".btn-user");
  const dropdownUser = document.querySelector(".dropdown-user");
  
  btnUser.addEventListener("click", () => {
    if (dropdownUser.classList.contains("show-dropdown-user")) {
      dropdownUser.classList.remove("show-dropdown-user");
    } else {
      dropdownUser.classList.add("show-dropdown-user");
    }
  });
} catch (error) {
}

// home
try {
  const container = document.querySelector('.icons-container');
  const nextButton = document.querySelector('.next-button');
  const prevButton = document.querySelector('.prev-button');
  
  nextButton.addEventListener('click', function() {
    container.scrollLeft += container.clientWidth;
    setTimeout(checkButtonsVisibility, 800); // Gọi hàm sau một khoảng thời gian rất ngắn
  });
  
  prevButton.addEventListener('click', function() {
    container.scrollLeft -= container.clientWidth;
    setTimeout(checkButtonsVisibility, 800); // Gọi hàm sau một khoảng thời gian rất ngắn
  });
  
  function checkButtonsVisibility() {
    const canScrollRight = container.scrollLeft + container.clientWidth < container.scrollWidth -1;
    const canScrollLeft = container.scrollLeft > 0;
    console.log(canScrollRight + "  " + canScrollLeft + "  "  + container.scrollLeft + container.clientWidth + " " + container.scrollWidth);
  
    if (canScrollRight) {
      nextButton.style.display = 'block';
    } else {
      nextButton.style.display = 'none';
    }
  
    if (canScrollLeft) {
      prevButton.style.display = 'block';
    } else {
      prevButton.style.display = 'none';
    }
  }
  
  checkButtonsVisibility();
  
  // Tự động kiểm tra lại khi cửa sổ thay đổi kích thước
  window.addEventListener('resize', checkButtonsVisibility);
} catch (error) {
}

//products
try {
  const btnCategory = document.querySelector(".parent_category");
  const subCategory = document.querySelector(".sub_category");

  function addHeight(){
    var liHeight = parseInt(getComputedStyle(subCategory.querySelector('li')).height);
    var hightSubCategory = liHeight * subCategory.children.length + 35;
    document.documentElement.style.setProperty('--ul-height', hightSubCategory + 'px');
  }

  btnCategory.addEventListener("click", () => {
    addHeight();
    if (subCategory.classList.contains("show")) {
      subCategory.classList.remove("show");
    } else {
      subCategory.classList.add("show");
    }
  }); 
} catch (error) {
}
