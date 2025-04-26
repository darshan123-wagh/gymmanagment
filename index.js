
document.addEventListener('DOMContentLoaded', function()
 {
    console.log('DOM is ready');
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // Text animation on page load
    window.addEventListener('load', () => {
        document.getElementById('tx1').classList.add('animate');
        document.getElementById('tx2').classList.add('animate');
    });
      
    // Wait for the DOM to fully load
    // Get all elements with the 'class' class
    const classElements = document.querySelectorAll(".class");
    const classInfoContainer = document.getElementById("class-info");
    const classTitle = document.getElementById("class-title");
    const classDetails = document.getElementById("class-details");
    const closeInfoButton = document.getElementById("close-info");
  
    // Function to display class info
    const showClassInfo = (title, info) => {
      classTitle.textContent = title;
      classDetails.textContent = info;
      classInfoContainer.style.display = "block";
    };
  
    // Function to hide class info
    const hideClassInfo = () => {
      classInfoContainer.style.display = "none";
    };
  
    // Add click event listeners to all class elements
    classElements.forEach((classElement) => {
      classElement.addEventListener("click", () => {
        const title = classElement.getAttribute("data-title");
        const info = classElement.getAttribute("data-info");
        showClassInfo(title, info);
      });
    });
  
    // Add click event listener to the close button
    closeInfoButton.addEventListener("click", hideClassInfo);
  
    // Hide class info when clicking outside of it
    window.addEventListener("click", (event) => {
      if (event.target === classInfoContainer) {
        hideClassInfo();
      }
    });

    // BMI Calculation
    const calculateBtn = document.getElementById('calculate-bmi');
    const weightInput = document.getElementById('weight');
    const heightInput = document.getElementById('height');
    const bmiValue = document.getElementById('bmi-value');
    
    calculateBtn.addEventListener('click', function() {
        const weight = parseFloat(weightInput.value);
        const height = parseFloat(heightInput.value);

        if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
            alert("Please enter valid weight and height values.");
            return;
        }

        const bmi = weight / (height * height); 
        bmiValue.textContent = bmi.toFixed(2);  
    });

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Image fade-in animation on scroll
    const images = document.querySelectorAll('#b1 img');
    function onScroll() {
        images.forEach(image => {
            if (image.getBoundingClientRect().top < window.innerHeight - 100) {
                image.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', onScroll);
    window.addEventListener('load', onScroll); // To trigger on page load

    // Testimonial carousel
    

        const plansData = {
          "weight-loss": {
            title: "Weight Loss Plan",
            description: "A focused plan with low-calorie, nutrient-dense meals to help you lose weight effectively.",
            meals: [
              "Breakfast: Oatmeal with fresh fruits",
              "Lunch: Grilled chicken salad",
              "Snack: Greek yogurt with almonds",
              "Dinner: Steamed salmon with veggies",
            ],
          },
          "muscle-gain": {
            title: "Muscle Gain Plan",
            description: "A protein-rich plan to fuel muscle recovery and growth after workouts.",
            meals: [
              "Breakfast: Scrambled eggs with avocado toast",
              "Lunch: Grilled steak with quinoa and broccoli",
              "Snack: Protein shake with a banana",
              "Dinner: Baked chicken breast with sweet potatoes",
            ],
          },
          "balanced": {
            title: "Balanced Nutrition Plan",
            description: "A well-rounded plan for maintaining overall health and energy levels.",
            meals: [
              "Breakfast: Smoothie bowl with granola",
              "Lunch: Turkey sandwich with a side of salad",
              "Snack: Carrot sticks with hummus",
              "Dinner: Stir-fried tofu with mixed vegetables",
            ],
          },
        };
      
        const modal = document.getElementById("plan-modal");
        const modalTitle = modal.querySelector(".modal-title");
        const modalDescription = modal.querySelector(".modal-description");
        const modalList = modal.querySelector(".modal-list");
        const closeModal = modal.querySelector(".close-modal");
      
        document.querySelectorAll(".plan-card .view-more").forEach((button) => {
          button.addEventListener("click", () => {
            const planType = button.closest(".plan-card").dataset.plan;
            const plan = plansData[planType];
      
            modalTitle.textContent = plan.title;
            modalDescription.textContent = plan.description;
            modalList.innerHTML = plan.meals.map((meal) => `<li>${meal}</li>`).join("");
      
            modal.style.display = "flex";
          });
        });
      
        closeModal.addEventListener("click", () => {
          modal.style.display = "none";
        });
      
        modal.addEventListener("click", (e) => {
          if (e.target === modal) {
            modal.style.display = "none";
          }
        });

      
            const form = document.getElementById("gym-admission-form");
          
            form.addEventListener("submit", (e) => {
              e.preventDefault(); // Prevent the form from refreshing the page
          
              // Gather form data
              const formData = new FormData(form);
              const formValues = Object.fromEntries(formData.entries());
          
              // Display a confirmation message (you can also send data to a server)
              alert(
                `Thank you, ${formValues.full_name}! Your admission request has been submitted successfully.`
              );
          
              // Reset the form after submission
              form.reset();
            });
      

      
});
