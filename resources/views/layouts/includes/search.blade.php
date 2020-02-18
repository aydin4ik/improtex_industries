<div class="section is-paddingless has-bg-striped p-b-200 is-relative is-hidden-mobile">
    <div class="container">
      <form method="POST" action="/search">
        <div class="field main-search has-addons">
          @csrf
          <div class="control is-expanded">
              <input type="text" name="query" class="input is-large is-radiusless has-text-weight-medium" placeholder="search" required>
              <p class="help is-primary is-family-secondary has-text-weight-bold is-size-6">Did not you find what you were looking for?</p>
          </div>
          <div class="control">
            <button type="submit" class="button">
              <span class="icon">
                <i class="fas fa-search"></i>
              </span>
            </button>
          </div>
        </div>
      </form>

      
    </div>
  </div>