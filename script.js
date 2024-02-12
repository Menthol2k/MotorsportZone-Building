function showToast(message) {
    const toastContainer = document.getElementById('toast-container');
    
    const existingToast = document.querySelector('.toast');
    if (existingToast) {
      toastContainer.removeChild(existingToast);
    }
    
    const toast = document.createElement('div');
    toast.classList.add('toast');
    toast.classList.add('josefin-normal');
    
    const icon = document.createElement('img');
    icon.src = '/images/check.gif';
    icon.classList.add('icon');
    toast.appendChild(icon);

    const text = document.createElement('span');
    text.textContent = message;
    toast.appendChild(text);
    
    toastContainer.appendChild(toast);
    toast.style.alignItems = 'center';
    toast.style.display = 'flex'; 
    toast.style.justifyContent = 'center'; 
    
    setTimeout(function() {
      toastContainer.removeChild(toast);
    }, 5000); 
  }

const sendMail = (event) => {
  event.preventDefault();
  let email_input = document.querySelector("#email_value");
  let email_value = email_input.value;
  showToast("Abonat cu success");

    fetch(
      `https://api.telegram.org/bot6942709025:AAGoI1eKQ4ait4urHFWpyynDyQeoe2kFYJM/sendMessage?chat_id=@mszzone&text=${email_value} s-a abonat la newsletter 📰`
    )
      .then((response) => {
        console.log("Send successfully");
        email_input.value = "";
      })
      .catch((error) => {
        console.error(error);
      });
};
