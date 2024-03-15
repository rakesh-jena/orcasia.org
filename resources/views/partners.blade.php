      @extends('web')
      @section('title', 'ORCA | Organisation for Research on China and Asia')
      @section('meta_keywords', 'ORCA')
      @section('meta_description', 'ORCA')

      @section('content')

          <style>
              .shock-header .navbar .navbar-nav .nav-link {
                  color: black !important;
              }
          </style>

          <!-- Table / Gallery -->
          <section class="shock-section mt-8 pt-3 pb-4 bg-color-lightbg gray-10">
              <div class="container">
                  <div class="row g-4">
                      <div class="col-12 col-md-12">
                          <!-- Intro -->
                          <div class="basic-intro">
                              <h2 class="title black">
                                  <span class="text-1 text-style-5">Our Collaboration </span>
                                  <span class="text-2 text-style-6 text-italic">Partners</span>
                              </h2>

                          </div>

                      </div>
                      <div class="col-12 col-md-12">
                          <!-- Gallery -->
                          <div class="gallery" data-lax="inertia-top">
                              <div class="row g-1">
                                  <div class="col-4">
                                      <a href="http://spsindia.in/" target="_blank" class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style="padding: 3rem!important;"
                                                  src="{{ URL::asset('images/spss.png') }}" class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Dialogue Partner: </strong>Society for Policy
                                          Studies (SPS) is a New Delhi-based independent think tank focused on India. It
                                          analyses India’s relations with the world, its place in South Asia and in the
                                          larger Indo-Pacific dynamic; its public policies and their strategic, security,
                                          economic, social and geopolitical impact. Through its various platforms, it
                                          provides a non-partisan forum for policymakers, opinion leaders and civil society
                                          to foster dialogue and engagement on critical issues, affecting India and the
                                          region.</p>
                                  </div>

                                  <div class="col-lg-4">
                                      <a href="https://www.ipsa-afrique.org/page/2/" target="_blank"
                                          class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style="padding: 3rem!important;"
                                                  src="{{ URL::asset('images/ipsaa.png') }}" class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Research Cooperation Partner: </strong>
                                          Initiative for Peace and Security in Africa (IPSA), a think-tank specializing in
                                          defense, security and peace studies based in Dakar, Senegal.</p>
                                  </div>
                                  <div class="col-lg-4">
                                      <a href="https://www.linkedin.com/company/fireside-chats-of-asian-pathfinders/"
                                          target="_blank" class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style="padding: 3rem!important;" src="{{ URL::asset('images/aps.png') }}"
                                                  class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Dialogue Partner: </strong>Asian Pathfinders
                                          is a knowledge sharing and networking forum to bring together scholars and
                                          practitioners working on the Asian region for a constructive dialogue.</p>
                                  </div>
                                  <div class="col-lg-4">
                                      <a href="https://indiaeuwomencouncil.com/" target="_blank" target="_blank"
                                          class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style="padding: 3rem!important;"
                                                  src="{{ URL::asset('images/wicci.png') }}" class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Promotional Cooperation Partner:
                                          </strong>WICCI’s India-EU Business Council is an up-to-date and diverse community
                                          of businesswomen, female entrepreneurs, and change-makers from all over India and
                                          the European Union. It serves as a networking platform to highlight their
                                          accomplishments and unique experiences. By sharing knowledge, business
                                          opportunities, and best practices the Council generates awareness of women’s
                                          contributions in developing the India-EU relations.</p>
                                  </div>
                                  <div class="col-lg-4">
                                      <a href="https://niice.org.np/" target="_blank" class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style=" padding: 3rem!important;"
                                                  src="{{ URL::asset('images/niice.png') }}" class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Research Cooperation Partner: </strong>Nepal
                                          Institute for International Cooperation and Engagement (NIICE) is an independent,
                                          apolitical and non-partisan think tank based in Nepal, which believes in freedom,
                                          democracy and a world free from conflict. We envision a world, where sources of
                                          insecurity are identified and understood, conflicts are prevented or resolved, and
                                          peace is advocated.</p>
                                  </div>
                                  <div class="col-lg-4">
                                      <a href="https://www.flame.edu.in/" target="_blank" class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style=" padding: 3rem!important;"
                                                  src="{{ URL::asset('images/flame.png') }}" class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Academic and Research Cooperation Partner:
                                          </strong>Flame University is an exceptional platform for students who can explore
                                          their academic journeys but not without the help of its renowned faculty and solid
                                          leadership. Experts from diverse backgrounds and qualifications and phenomenal
                                          industry experience guide the students at FLAME.
                                      </p>
                                  </div>
                                  <div class="col-lg-4">
                                      <a href="https://ppf.org.in/" target="_blank" class="item hover-grayscale">
                                          <div class="image-wrapper">
                                              <div class="overlay has-border rounded black"></div>
                                              <img style=" padding: 3rem!important;"
                                                  src="{{ URL::asset('images/PPF_Logo.png') }}"
                                                  class="image p-1 fit-cover" />
                                          </div>
                                      </a>
                                      <p class="mt-1 mb-1 text-center"><strong>Research and Event Cooperation Partner:
                                          </strong>The Policy Perspectives Foundation (PPF) was founded in 2005 as a
                                          non-profit and apolitical think-tank on matters of national interest. The
                                          organisation’s activities focus on complex and inter-connected challenges to
                                          internal peace, stability and development in India.</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

          </main>

      @endsection
