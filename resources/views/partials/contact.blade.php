<section class="contact" id="contact">
  <div class="container">
    <h2 class="section-title"><i class="fas fa-envelope"></i> Get in Touch</h2>
    <div class="contact-wrapper">
<form class="contact-form" method="POST" action="javascript:void(0);" onsubmit="location.reload()">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required>
          @error('name')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="your@email.com" required>
          @error('email')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" class="form-control" rows="5" placeholder="Your message here..." required></textarea>
          @error('message')
            <span class="error-message">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="submit-btn">
          <i class="fas fa-paper-plane"></i> Send Message
        </button>
      </form>
      <div class="map-info">
        <h3>Visit Our Bakery</h3>
        <p><i class="fas fa-map-marker-alt"></i> 123 Pastry Lane, Breadville</p>
        <p><i class="fas fa-clock"></i> Mon–Sat: 8am – 7pm<br>Sun: 9am – 3pm</p>
        <p><i class="fas fa-phone"></i> +212 6 12 34 56 78</p>
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-0.12345678901234567!3d51.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTHCsDA3JzI0LjQiTiAwwrAwNyczOS4yIlc!5e0!3m2!1sen!2suk!4v1234567890123!5m2!1sen!2suk" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.contact {
  padding: 4rem 0;
  background-color: #f9f9f9;
}

.contact-wrapper {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  margin-top: 2rem;
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.form-group {
  display: flex;
  flex-direction: column;
  /* gap: 0.5rem; */
}

.form-group label {
  font-weight: 600;
  color: #333;
}

.form-control {
  padding: 0.8rem 1rem;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.form-control:focus {
  outline: none;
  border-color: #8e6a5a;
  box-shadow: 0 0 0 3px rgba(142, 106, 90, 0.1);
}

.form-control::placeholder {
  color: #aaa;
}

textarea.form-control {
  min-height: 150px;
  resize: vertical;
}

.error-message {
  color: #e74c3c;
  font-size: 0.9rem;
  margin-top: 0.25rem;
}

.submit-btn {
  background-color: #8e6a5a;
  color: white;
  padding: 1rem 2rem;
  border: none;
  border-radius: 6px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

.submit-btn:hover {
  background-color: #7a5849;
  transform: translateY(-2px);
}

.map-info {
  background: white;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.map-info h3 {
  margin-bottom: 1.5rem;
  color: #333;
}

.map-info p {
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: #555;
}

.map-info i {
  width: 20px;
  text-align: center;
  color: #8e6a5a;
}

.map-container {
  margin-top: 1.5rem;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
  .contact-wrapper {
    grid-template-columns: 1fr;
  }
}
</style>