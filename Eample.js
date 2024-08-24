const dataContainer = document.getElementById("container_id");

fetch("https://jsonplaceholder.typicode.com/posts")
//then รอบแรกคือการแปลงข้อมูลเก็บลงไปในพารามิเตอร์ชื่อ response และ เอาตัว response.json เพื่อแปลงข้อมูลจากJSONให้เป็นJs object
  .then(response => response.json())

  //รอบ2คือการสร้างพารามิเตอร์มารับค่าจาก.thenตัวแรกที่แปลงเป็น js object
  .then(data => {
    // ลูป forEach วงลูปค่าทั้งหมด
    data.forEach(post => {
      console.log(post);
      
      const postElement = document.createElement("p");
      postElement.textContent = `
          Post ID: ${post.id}, Title: ${post.title}, Body:${post.body}
      `;
      dataContainer.appendChild(postElement);
    })
  })
  .catch(error => {
    console.log("Error fetching data", error);
  })