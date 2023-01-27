/*
 * Copyright (C) 2020 Linux Studio Plugins Project <https://lsp-plug.in/>
 *           (C) 2020 Vladimir Sadovnikov <sadko4u@gmail.com>
 *
 * This file is part of lsp-plugins-shared
 * Created on: 25 нояб. 2020 г.
 *
 * lsp-plugins-shared is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * lsp-plugins-shared is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with lsp-plugins-shared. If not, see <https://www.gnu.org/licenses/>.
 */

#ifndef LSP_PLUG_IN_SHARED_META_DEVELOPERS_H_
#define LSP_PLUG_IN_SHARED_META_DEVELOPERS_H_

#include <lsp-plug.in/shared/version.h>
#include <lsp-plug.in/plug-fw/meta/types.h>

#define LSP_LADSPA_BASE                     0x4C5350
#define LSP_BASE_URI                        "http://lsp-plug.in/"

#define LSP_LV2_URI(id)                     LSP_BASE_URI "plugins/lv2/" id
#define LSP_LADSPA_URI(id)                  LSP_BASE_URI "plugins/ladspa/" id
#define LSP_LV2UI_URI(id)                   LSP_BASE_URI "ui/lv2/" id
#define LSP_CLAP_URI(id)                    "in.lsp-plug." id

// LADSPA identifier allocation
#define LSP_LADSPA_PHASE_DETECTOR_BASE      (LSP_LADSPA_BASE + 0)
#define LSP_LADSPA_COMP_DELAY_BASE          (LSP_LADSPA_BASE + 1)
#define LSP_LADSPA_SPECTRUM_ANALYZER_BASE   (LSP_LADSPA_BASE + 4)
#define LSP_LADSPA_PARA_EQUALIZER_BASE      (LSP_LADSPA_BASE + 10)
#define LSP_LADSPA_GRAPH_EQUALIZER_BASE     (LSP_LADSPA_BASE + 18)
#define LSP_LADSPA_COMPRESSOR_BASE          (LSP_LADSPA_BASE + 26)
#define LSP_LADSPA_DYNAMIC_PROCESSOR_BASE   (LSP_LADSPA_BASE + 34)
#define LSP_LADSPA_EXPANDER_BASE            (LSP_LADSPA_BASE + 42)
#define LSP_LADSPA_GATE_BASE                (LSP_LADSPA_BASE + 50)
#define LSP_LADSPA_LIMITER_BASE             (LSP_LADSPA_BASE + 58)
#define LSP_LADSPA_IMPULSE_RESPONSES_BASE   (LSP_LADSPA_BASE + 62)
#define LSP_LADSPA_IMPULSE_REVERB_BASE      (LSP_LADSPA_BASE + 64)
#define LSP_LADSPA_SLAP_DELAY_BASE          (LSP_LADSPA_BASE + 66)
#define LSP_LADSPA_OSCILLATOR_BASE          (LSP_LADSPA_BASE + 68)
#define LSP_LADSPA_LATENCY_METER_BASE       (LSP_LADSPA_BASE + 69)
#define LSP_LADSPA_MB_COMPRESSOR_BASE       (LSP_LADSPA_BASE + 70)
#define LSP_LADSPA_PROFILER_BASE            (LSP_LADSPA_BASE + 78)
#define LSP_LADSPA_ROOM_BUILDER_BASE        (LSP_LADSPA_BASE + 80)
#define LSP_LADSPA_MB_EXPANDER_BASE         (LSP_LADSPA_BASE + 82)
#define LSP_LADSPA_MB_GATE_BASE             (LSP_LADSPA_BASE + 90)
#define LSP_LADSPA_LOUD_COMP_BASE           (LSP_LADSPA_BASE + 98)
#define LSP_LADSPA_SURGE_FILTER_BASE        (LSP_LADSPA_BASE + 100)
#define LSP_LADSPA_CROSSOVER_BASE           (LSP_LADSPA_BASE + 102)
#define LSP_LADSPA_ART_DELAY_BASE           (LSP_LADSPA_BASE + 106)
#define LSP_LADSPA_OSCILLOSCOPE_BASE        (LSP_LADSPA_BASE + 108)
#define LSP_LADSPA_MB_DYNA_PROCESSOR_BASE   (LSP_LADSPA_BASE + 120)
#define LSP_LADSPA_NOISE_GENERATOR_BASE     (LSP_LADSPA_BASE + 128)
#define LSP_LADSPA_MIXER_BASE               (LSP_LADSPA_BASE + 140)

namespace lsp
{
    namespace developers
    {
        extern const meta::person_t         v_sadovnikov;
        extern const meta::person_t         s_tronci;
    } /* namespace developers */
} /* namespace lsp */


#endif /* LSP_PLUG_IN_SHARED_META_DEVELOPERS_H_ */
