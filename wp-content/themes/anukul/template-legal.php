<?php
/**
 * Template Name: Legal & Policy Document
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Dynamic navigation links for legal policies
$policy_pages = array(
    'terms-and-conditions' => array(
        'title' => __( 'Terms & Conditions', 'anukul' ),
        'icon'  => 'gavel',
        'desc'  => __( 'Service terms, orders & IP usage', 'anukul' ),
    ),
    'shipping-policy' => array(
        'title' => __( 'Shipping Policy', 'anukul' ),
        'icon'  => 'local_shipping',
        'desc'  => __( 'Pan-India dispatches & timelines', 'anukul' ),
    ),
    'return-policy' => array(
        'title' => __( 'Return & Refund Policy', 'anukul' ),
        'icon'  => 'assignment_return',
        'desc'  => __( 'Apothecary returns & cancellations', 'anukul' ),
    ),
    'privacy-policy' => array(
        'title' => __( 'Privacy Policy', 'anukul' ),
        'icon'  => 'shield',
        'desc'  => __( 'Data security & client confidentiality', 'anukul' ),
    ),
    'disclaimer' => array(
        'title' => __( 'Medical & Spatial Disclaimer', 'anukul' ),
        'icon'  => 'verified_user',
        'desc'  => __( 'Ayush guidelines & Astro-Vastu scope', 'anukul' ),
    ),
    'consultation-consent' => array(
        'title' => __( 'Online Consultation Consent Form', 'anukul' ),
        'icon'  => 'assignment_turned_in',
        'desc'  => __( 'Ayurveda, Vastu & Astro Nadi clinical consent', 'anukul' ),
    ),
);

global $post;
$current_slug = $post ? $post->post_name : '';
?>

<!-- Minimalist Breadcrumb Bar -->
<section class="w-full bg-[#F7F1E3]/80 border-b border-[#E8D8BC] py-3.5">
  <div class="max-w-[1360px] mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-sm">
    <nav aria-label="Breadcrumb" class="flex items-center gap-2 tracking-wider">
      <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anukul' ); ?></a>
      <span class="opacity-40">/</span>
      <span class="text-outline uppercase font-label-sm text-xs"><?php esc_html_e( 'Legal & Compliance', 'anukul' ); ?></span>
      <span class="opacity-40">/</span>
      <span class="text-primary font-semibold"><?php the_title(); ?></span>
    </nav>
    <div class="hidden sm:flex items-center gap-2 font-label-sm text-xs uppercase tracking-[0.2em] text-secondary font-bold">
      <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
      <?php esc_html_e( 'Statutory Regulatory Framework', 'anukul' ); ?>
    </div>
  </div>
</section>

<!-- Legal Sanctuary Document Container -->
<div class="relative w-full px-6 lg:px-12 py-10 max-w-[1360px] mx-auto">
  <div class="absolute top-0 right-0 w-96 h-96 bg-primary-fixed-dim/15 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20"></div>

  <!-- Document Header Hero -->
  <header class="mb-10 pb-8 border-b border-[#E8D8BC] relative">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
      <div class="max-w-3xl space-y-2">
        <div class="flex items-center gap-2">
          <span class="px-3 py-1 rounded-full bg-primary/10 text-primary font-label-sm text-xs uppercase tracking-widest font-bold">
            <?php esc_html_e( 'Official Governance Document', 'anukul' ); ?>
          </span>
          <span class="text-outline-variant">&bull;</span>
          <span class="font-label-sm text-xs text-outline uppercase tracking-wider">
            <?php esc_html_e( 'Govt. of India Aligned', 'anukul' ); ?>
          </span>
        </div>
        <h1 class="font-headline-lg text-3xl sm:text-4xl lg:text-5xl text-primary font-serif tracking-tight">
          <?php the_title(); ?>
        </h1>
        <p class="font-body-md text-sm sm:text-base text-on-surface-variant leading-relaxed">
          <?php esc_html_e( 'Governing the purchase of consecrated classical herbal formulations, brass Vastu remedial artifacts, and private Ayurvedic & Astro-Vastu Muhurta clinical consultations.', 'anukul' ); ?>
        </p>
      </div>

      <div class="flex flex-wrap items-center gap-3 shrink-0">
        <div class="bg-surface-container-low px-4 py-2.5 rounded-xl border border-[#E8D8BC]/80 shadow-sm flex items-center gap-3">
          <span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">history</span>
          <div>
            <span class="font-label-sm text-[10px] text-outline uppercase tracking-wider block font-bold"><?php esc_html_e( 'Last Revision', 'anukul' ); ?></span>
            <span class="font-body-sm text-xs text-primary font-semibold"><?php echo esc_html( get_the_modified_date( 'F j, Y' ) ); ?></span>
          </div>
        </div>
        <button type="button" onclick="window.print()" class="px-4 py-2.5 rounded-xl bg-surface border border-[#E8D8BC] hover:border-primary text-primary transition-all font-label-md text-xs uppercase tracking-wider font-semibold inline-flex items-center gap-1.5 shadow-sm" title="Print or save document">
          <span class="material-symbols-outlined notranslate text-[16px]" translate="no">print</span>
          <span><?php esc_html_e( 'Print', 'anukul' ); ?></span>
        </button>
      </div>
    </div>

    <!-- Quick Navigation Policy Switcher Strip -->
    <div class="mt-8 pt-6 border-t border-[#E8D8BC]/60">
      <p class="font-label-sm text-xs uppercase tracking-wider text-secondary font-bold mb-3 flex items-center gap-1.5">
        <span class="material-symbols-outlined notranslate text-[16px]" translate="no">policy</span>
        <?php esc_html_e( 'Sanctuary Legal Registry:', 'anukul' ); ?>
      </p>
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2.5">
        <?php foreach ( $policy_pages as $slug => $meta ) : 
          $is_current = ( $current_slug === $slug );
          $target_url = home_url( '/' . $slug . '/' );
        ?>
          <a href="<?php echo esc_url( $target_url ); ?>" class="p-3 rounded-xl border transition-all flex flex-col justify-between <?php echo $is_current ? 'bg-primary text-on-primary border-primary shadow-md' : 'bg-surface-container-low border-[#E8D8BC]/70 text-on-surface hover:border-primary/50 hover:bg-surface-container'; ?>">
            <div class="flex items-center gap-2 mb-1">
              <span class="material-symbols-outlined notranslate text-[18px] <?php echo $is_current ? 'text-secondary-fixed' : 'text-secondary'; ?>" translate="no"><?php echo esc_html( $meta['icon'] ); ?></span>
              <span class="font-label-md text-xs font-bold leading-tight <?php echo $is_current ? 'text-white' : 'text-primary'; ?>"><?php echo esc_html( $meta['title'] ); ?></span>
            </div>
            <span class="font-body-sm text-[10px] leading-tight <?php echo $is_current ? 'text-white/80' : 'text-outline'; ?> truncate"><?php echo esc_html( $meta['desc'] ); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </header>

  <!-- Document Layout (Sidebar & Main Editorial Body) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
    
    <!-- Main Policy Content (Admin Editable via the_content) -->
    <main class="lg:col-span-8 bg-surface-container-low p-6 sm:p-10 rounded-2xl border border-[#E8D8BC]/80 shadow-sm relative overflow-hidden">
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'anukul-legal-prose' ); ?>>
          <?php the_content(); ?>
        </article>
      <?php endwhile; ?>
    </main>

    <!-- Side Regulatory Coordinates & Grievance Plaque (Span 4) -->
    <aside class="lg:col-span-4 flex flex-col gap-6 sticky top-28">
      
      <!-- Statutory Grievance & Nodal Officer Box (E-Commerce Rules 2020) -->
      <div class="bg-surface-container-low rounded-xl p-6 border border-[#E8D8BC]/80 shadow-sm relative overflow-hidden">
        <div class="flex items-center gap-3 pb-3 mb-4 border-b border-[#E8D8BC]/50">
          <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
            <span class="material-symbols-outlined notranslate text-[22px]" translate="no">verified_user</span>
          </div>
          <div>
            <h3 class="font-headline-sm text-lg text-primary font-bold"><?php esc_html_e( 'Grievance Desk', 'anukul' ); ?></h3>
            <p class="font-label-sm text-[11px] text-outline uppercase tracking-wider"><?php esc_html_e( 'Statutory Redressal', 'anukul' ); ?></p>
          </div>
        </div>

        <p class="font-body-sm text-xs text-on-surface-variant leading-relaxed mb-4">
          <?php esc_html_e( 'In accordance with the Information Technology Act 2000 and the Consumer Protection (E-Commerce) Rules 2020, grievance redressal coordinates are designated below:', 'anukul' ); ?>
        </p>

        <div class="space-y-3 font-body-sm text-xs text-on-surface bg-surface-container-lowest p-4 rounded-lg border border-[#E8D8BC]/40">
          <div>
            <span class="font-label-sm text-[10px] text-outline uppercase tracking-wider block font-bold"><?php esc_html_e( 'Nodal / Grievance Officer', 'anukul' ); ?></span>
            <span class="font-semibold text-primary"><?php esc_html_e( 'Compliance Secretariat, ANUKUL', 'anukul' ); ?></span>
          </div>
          <div>
            <span class="font-label-sm text-[10px] text-outline uppercase tracking-wider block font-bold"><?php esc_html_e( 'Official Email', 'anukul' ); ?></span>
            <a href="mailto:sanctuary@anukul-harmony.com" class="text-secondary hover:text-primary font-medium underline">sanctuary@anukul-harmony.com</a>
          </div>
          <div>
            <span class="font-label-sm text-[10px] text-outline uppercase tracking-wider block font-bold"><?php esc_html_e( 'Direct Tele-Helpline', 'anukul' ); ?></span>
            <a href="tel:+917624012501" class="text-primary font-semibold hover:text-secondary">+91 76240 12501</a>
          </div>
          <div>
            <span class="font-label-sm text-[10px] text-outline uppercase tracking-wider block font-bold"><?php esc_html_e( 'Registered Premises', 'anukul' ); ?></span>
            <span class="text-on-surface-variant"><?php esc_html_e( 'ANUKUL Healthcare Sanctuary, Maharashtra, India', 'anukul' ); ?></span>
          </div>
          <div class="pt-2 border-t border-[#E8D8BC]/40">
            <span class="font-label-sm text-[10px] text-secondary uppercase tracking-wider block font-bold"><?php esc_html_e( 'Resolution Standard', 'anukul' ); ?></span>
            <span class="text-on-surface-variant text-[11px]"><?php esc_html_e( 'Acknowledgment within 48 business hours; resolution within 30 days.', 'anukul' ); ?></span>
          </div>
        </div>
      </div>

      <!-- Quick Action / Consultation Support Card -->
      <div class="bg-primary text-on-primary rounded-xl p-6 shadow-md relative overflow-hidden">
        <div class="relative z-10 space-y-3">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-primary-fixed font-label-sm text-xs uppercase tracking-wider font-semibold">
            <span class="w-2 h-2 rounded-full bg-secondary"></span>
            <?php esc_html_e( 'Client Support Sanctuary', 'anukul' ); ?>
          </span>
          <h4 class="font-headline-sm text-xl text-white font-normal">
            <?php esc_html_e( 'Questions on Formulation or Session Policies?', 'anukul' ); ?>
          </h4>
          <p class="font-body-sm text-xs text-[#E8D8BC]/85 leading-relaxed">
            <?php esc_html_e( 'Connect directly with our care team for personalized guidance regarding orders, dispatch tracking, or appointment rescheduling.', 'anukul' ); ?>
          </p>
          <div class="pt-2 flex flex-col sm:flex-row gap-2">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-4 py-2.5 rounded-lg bg-surface text-primary hover:bg-[#F7F1E3] font-label-md text-xs uppercase tracking-wider font-bold transition-all text-center shadow-sm">
              <?php esc_html_e( 'Contact Sanctuary', 'anukul' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="px-4 py-2.5 rounded-lg border border-white/30 text-white hover:bg-white/10 font-label-md text-xs uppercase tracking-wider transition-all text-center">
              <?php esc_html_e( 'Book Consultation', 'anukul' ); ?>
            </a>
          </div>
        </div>
        <div class="absolute -right-8 -bottom-8 w-36 h-36 rounded-full bg-white/5 pointer-events-none"></div>
      </div>

    </aside>

  </div>
</div>

<!-- Embedded Policy Typography Styling -->
<style>
.anukul-legal-prose h2 {
  font-family: var(--font-serif, "Cinzel", Georgia, serif);
  font-size: 1.5rem;
  font-weight: 700;
  color: #023625;
  margin-top: 2rem;
  margin-bottom: 0.85rem;
  padding-bottom: 0.5rem;
  border-bottom: 1px solid rgba(232, 216, 188, 0.7);
  letter-spacing: -0.01em;
}
.anukul-legal-prose h2:first-of-type {
  margin-top: 0;
}
.anukul-legal-prose h3 {
  font-family: var(--font-serif, "Cinzel", Georgia, serif);
  font-size: 1.2rem;
  font-weight: 600;
  color: #023625;
  margin-top: 1.5rem;
  margin-bottom: 0.5rem;
}
.anukul-legal-prose p {
  font-size: 0.9375rem;
  line-height: 1.75;
  color: #2D3748;
  margin-bottom: 1.15rem;
}
.anukul-legal-prose ul, .anukul-legal-prose ol {
  margin-bottom: 1.25rem;
  padding-left: 1.5rem;
  color: #2D3748;
  font-size: 0.9375rem;
  line-height: 1.75;
}
.anukul-legal-prose ul {
  list-style-type: disc;
}
.anukul-legal-prose ol {
  list-style-type: decimal;
}
.anukul-legal-prose li {
  margin-bottom: 0.5rem;
}
.anukul-legal-prose strong {
  color: #023625;
  font-weight: 600;
}
.anukul-legal-prose blockquote {
  border-left: 3px solid #B38A3E;
  background: rgba(247, 241, 227, 0.6);
  padding: 1rem 1.25rem;
  margin: 1.5rem 0;
  border-radius: 0 0.5rem 0.5rem 0;
  font-style: italic;
  color: #023625;
}
.anukul-legal-prose table {
  width: 100%;
  margin: 1.5rem 0;
  border-collapse: collapse;
  font-size: 0.875rem;
}
.anukul-legal-prose th, .anukul-legal-prose td {
  padding: 0.75rem 1rem;
  border: 1px solid #E8D8BC;
  text-align: left;
}
.anukul-legal-prose th {
  background: #F7F1E3;
  color: #023625;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 0.75rem;
  letter-spacing: 0.05em;
}
.anukul-legal-prose tr:nth-child(even) {
  background: rgba(247, 241, 227, 0.3);
}
</style>

<?php
get_footer();
