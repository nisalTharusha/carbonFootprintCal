function updateDisplay() {
	var product1 = parseFloat(document.getElementById("product1").value); // DEVICE
	var product2 = parseFloat(document.getElementById("product2").value); // HOUR OF USE
	var product3 = parseFloat(document.getElementById("product3").value); // COUNTRY

	//selected option as a text

	var selectElement = document.getElementById("product1");
	var selectedOptionText = selectElement.options[selectElement.selectedIndex].textContent;


	var cw = 0.6;
	var car_Emissions = 1.84;
	var Flight_Emissions =30.96;
	var tree_consumtion = 22;

	const myMeter = document.getElementById("my-meter");
	myMeter.value = product1 * product2  * cw*100.00;

	const myMeter1 = document.getElementById("my-meter");
	if (myMeter1.value > 60 && (selectedOptionText === "Dishwashers" || selectedOptionText === "Washing machines"|| selectedOptionText === "Refrigerators")) {
		myMeter1.classList.remove("red");
	} else if (myMeter1.value > 60) {
		myMeter1.classList.add("red");
	} else {
		myMeter1.classList.remove("red");
	}
	

	var value = myMeter.value;
	var habitsList = document.getElementById("habits-list");
	habitsList.innerHTML = "";

	if (selectedOptionText == "Desktop Computer") {
		// Create list of recommendations
		var recommendations = ["Enable power-saving features and sleep mode on your desktop to reduce energy consumption", "Choose energy-efficient desktop computers and peripherals with ENERGY STAR certification", "Keep the computer area well-veTurn off and unplug your computer when not in use to eliminate standby power consumptiond", "Use energy-saving Reduce screen brightness and use energy-saving modes to conserve power"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Laptop Computer") {
		// Create list of recommendations
		var recommendations = ["Avoid using the laptop on soft surfaces", "Keep the laptop battery charged optimally", "Clean the laptop regularly", "Use a cooling pad for better heat dissipation"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Printer") {
		// Create list of recommendations
		var recommendations = ["Print in grayscale or draft mode when possible", "Print double-sided to save paper", "Use recycled paper", "Turn off the printer when not in use"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Projector") {
		// Create list of recommendations
		var recommendations = ["Use energy-efficient projectors", "Turn off the projector when not in use", "Clean the projector regularly for optimal performance", "Adjust brightness and contrast settings to conserve energy"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Refrigerators") {
		// Create list of recommendations
		var recommendations = ["Set the refrigerator temperature to the recommended level", "Keep the refrigerator coils clean for better efficiency", "Avoid placing hot food directly into the refrigerator", "Regularly defrost and clean the refrigerator"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Air conditioners") {
		// Create list of recommendations
		var recommendations = ["Set the air conditioner temperature to an energy-efficient level", "Clean or replace air filters regularly", "Use ceiling fans to complement the air conditioner", "Keep doors and windows closed when using the air conditioner"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Washing machines") {
		// Create list of recommendations
		var recommendations = ["Wash full loads of laundry to maximize efficiency", "Use cold water whenever possible", "Choose energy-efficient washing cycles", "Clean the washing machine periodically"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else if (selectedOptionText == "Dishwashers") {
		// Create list of recommendations
		var recommendations = ["Run the dishwasher with full loads", "Choose the energy-saving mode or shorter cycles", "Scrape off excess food before loading dishes", "Regularly clean the dishwasher filters"];
		for (var i = 0; i < recommendations.length; i++) {
		var listItem = document.createElement("li");
		listItem.textContent = recommendations[i];
		habitsList.appendChild(listItem);
		}
	} else {
		// Handle any other selected option
	}
	






	

	document.getElementById("display").innerHTML = (product1 * product2 * cw).toFixed(3);


	document.getElementById("Car-value").innerHTML = (product1 * product2 *cw/ car_Emissions).toFixed(3) +" %";
	document.getElementById("Plane-value").innerHTML = (product1 * product2 *cw/Flight_Emissions).toFixed(3)+" %";
	document.getElementById("tree-value").innerHTML = (product1 * product2 * cw/tree_consumtion).toFixed(3) +" %";
}
