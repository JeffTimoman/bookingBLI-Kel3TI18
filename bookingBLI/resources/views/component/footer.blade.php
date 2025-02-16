<!-- Footer -->
<div class="bg-gradient-to-b bottom-0 from-[#004AAD] to-[#00092D] text-white">
    <footer class="w-full py-6 md:py-10 px-6 md:px-12 lg:px-24">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Left Section - Logo -->
            <div class="flex flex-col items-start gap-2">
                <img src="{{ asset('./landing/logo.png') }}" alt="BCA Logo" class="h-28 md:h-40">
            </div>

            <!-- Middle Left - Lokasi -->
            <div>
                <h3 class="text-sm font-normal mb-3">Lokasi</h3>
                <p class="text-xs md:text-sm leading-6 md:leading-8 font-normal tracking-wider">
                    Sentul City<br>
                    Jl. Pakuan No. 3, Sumur Batu, Babakan Madang, <br>
                    Bogor 16810
                </p>
            </div>

            <!-- Middle Right - Hubungi Kami -->
            <div>
                <h3 class="text-sm font-normal mb-3">Hubungi Kami</h3>
                <ul class="text-xs md:text-sm leading-8 md:leading-10">
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/phone.svg') }}" alt="Phone" class="h-5">
                        <span>Halo BCA 1500888</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/mail.svg') }}" alt="Email" class="h-5">
                        <span>halobca@bca.co.id</span>
                    </li>
                    
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/wa.svg') }}" alt="Phone 2" class="h-5">
                        <span>62-922-0355-800</span>
                    </li>
                </ul>
            </div>

            <!-- Right Section - Media Sosial -->
            <div>
                <h3 class="text-sm font-normal mb-2">Media Sosial</h3>
                <ul class="flex flex-col space-y-2 md:space-y-3 text-xs md:text-sm">
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/fb.svg') }}" alt="Facebook" class="h-4 md:h-5">
                        <span>GoodLife BCA</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/ig.svg') }}" alt="Twitter" class="h-4 md:h-5">
                        <span>@goodlifebca</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/yt.svg') }}" alt="Instagram" class="h-4 md:h-5">
                        <span>Solusi BCA</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('./landing/x.svg') }}" alt="YouTube" class="h-4 md:h-5">
                        <span>@BankBCA</span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>